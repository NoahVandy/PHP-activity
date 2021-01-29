<?php

namespace App\Http\Controllers;

use App\Services\Business\SecurityService;
use Exception;
use App\Services\Utility\MyLogger1;
use App\Services\Utility\MyLogger2;
use App\Models\DTO;

class UserRestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $service = new SecurityService();
            $users = $service->getAllUsers();
            
            $dto = new DTO(0, "OK", $users);
            
            $json = json_encode($dto);
            
            return $json;
        } catch (Exception $e1){
            MyLogger2::error("Exception: ", array("message" => $e1->getMessage()));
            
            $dto = new DTO(-2, $e1->getMessage(), "");
            return json_encode($dto);
        }
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $service = new SecurityService();
            $user = $service->findUserById($id);
            
            if ($user == null)
                $dto = new DTO(-1, "User Not Found", "");
                else
                    $dto = new DTO(0, "OK", $user);
                    
                    $json = json_encode($dto);
                    
                    return $json;
                    
        } catch (Exception $e1){
            MyLogger2::error("Exception: ", array("message" => $e1->getMessage()));
            
            $dto = new DTO(-2, $e1->getMessage(), "");
            return json_encode($dto);
        }
    }
}