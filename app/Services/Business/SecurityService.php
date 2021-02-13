<?php
namespace App\Services\Business;

use App\Models\UserModel;
use Illuminate\Support\Facades\Log; 
use\PDO;
use App\Services\Data\SecurityDAO; 

class SecurityService
{
    public function login(UserModel $user)
    {
        Log::info("entering SecurityService");
        
        // GET credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");

        Log::info("servername: " . $servername . " port: " . $port . " username: " . $username . " password: " . $password);
        
        // create connection
        $db = new PDO('mysql:dbname=activity323;host=34.68.247.65', $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // create a Security Service DAO with this connection and try to find the password in the user 
        $service = new SecurityDAO($db);
        $flag = $service->findByUser($user);
        
        // closing the connection by making the database object null so garbage collection picks it up
        $db = null;
        
        // return the finder results
        Log::info("Exit Securty Service.login()");
        return $flag;
    }
    
    public function findUserById($id)
    {
        Log::info("entering SecurityService");
        
        // GET credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        // create connection
        $db = new PDO("mysql:host=$servername;
                        port=$port;
                        dbname=$dbname",
            $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // create a Security Service DAO with this connection and try to find the password in the user
        $service = new SecurityDAO($db);
        $flag = $service->findByUserId($id);
        
        // closing the connection by making the database object null so garbage collection picks it up
        $db = null;
        
        // return the finder results
        Log::info("Exit Securty Service.login()");
        return $flag;
    }
    public function getAllUsers()
    {
        Log::info("entering SecurityService");
        
        // GET credentials for accessing the database
        $servername = config("database.connections.mysql.host");
        $port = config("database.connections.mysql.port");
        $username = config("database.connections.mysql.username");
        $password = config("database.connections.mysql.password");
        $dbname = config("database.connections.mysql.database");
        
        // create connection
        $db = new PDO("mysql:host=$servername;
                        port=$port;
                        dbname=$dbname",
            $username, $password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        // create a Security Service DAO with this connection and try to find the password in the user
        $service = new SecurityDAO($db);
        $flag = $service->findAllUsers();
        
        // closing the connection by making the database object null so garbage collection picks it up
        $db = null;
        
        // return the finder results
        Log::info("Exit Securty Service.login()");
        return $flag;
        
    }
}