<?php
namespace App\Services\Data;
use \PDO;
use App\Models\UserModel;
use Illuminate\Support\Facades\Log;
use App\Services\Utility\MyLogger2;
use App\Services\Utility\DatabaseException; 
use PDOException;

class SecurityDAO
{
    
    private $db = NULL;
    
    //BEST practice: Do not create Database Connections in a
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function findByUser(UserModel $user)
    {
        MyLogger2::info("Enter SecurityDAO.findByUser()");
        
        try
        {
            
            //Select username and password and see if this row exists
            $name = $user->getUsername();
            $pw = $user->getPassword();
            
            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM USERS
                                       WHERE USERNAME = :username AND PASSWORD = :password");
            $stmt->bindParam(':username', $name);
            $stmt->bindParam(':password', $pw);
            $stmt->execute();
            
            //See if user existed and return true if found else return false if not found
            //Bad practice: this is a business rules in our DAO
            if ($stmt->rowCount() == 1){
                MyLogger2::info("Exit SecurityDAO.findByUser() with true");
                return true;
                
            }
            else{
                MyLogger2::info("Exit SecurityDAO.findByUser() with false");
                return false;
            }
            
        }
        catch (PDOException $e)
        {
            //BEST practice: catch all exceptions (do not swallow exceptions),
            //log the exception, do not throw technology specific exceptions, and throw a cusom exception
            MyLogger2::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception " . $e->getMessage(), 0, $e);
        }
    }
    
    public function findByUserId($id)
    {
        try 
        {
            $stmt = $this->db->prepare("SELECT ID, USERNAME, PASSWORD FROM users WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            if($stmt->rowCount() == 0)
            {
                return null;
            }
            else
            {
                $row = $stmt->fetch(PDo::FETCH_ASSOC);
                $user = new UserModel($row['ID'], $row['USERNAME'], $row['PASSWORD']);
                return $user;
            }
        } 
        catch (PDOException $e) 
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception " . $e->getMessage(), 0, $e);
        }
    }
    
    public function findAllUsers()
    {
        try
        {
            $stmt = $this->db->prepare("SELECT * FROM users");
            $stmt->execute();
            
            if($stmt->rowCount() == 0)
            {
                return array();
            }
            else
            {
                $index = 0;
                $users = array();
                while($row = $stmt->fetch(PDo::FETCH_ASSOC))
                {
                    $user = new UserModel($row['ID'], $row['USERNAME'], $row['PASSWORD']);
                    $users[$index++] = $user;
                }
                return $users;
            }
        }
        catch (PDOException $e)
        {
            Log::error("Exception: ", array("message" => $e->getMessage()));
            throw new DatabaseException("Database Exception " . $e->getMessage(), 0, $e);
        }
    }
    
    
}