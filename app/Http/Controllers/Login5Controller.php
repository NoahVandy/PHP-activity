<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Exception;
use App\Services\Utility\MyLogger1;
use App\Services\Utility\MyLogger2;

class Login5Controller extends Controller
{
    public function test()
    {
        return "testing 123";
    }
    
    public function test2()
    {
        return view('HelloWorld');
    }
    
    public function index(Request $request){
        try
        {
            $this->validateForm($request);
            $username = $request->input("username");
            $password = $request->input("password");
            MyLogger2::info("Enter Login5Controller.index()");
            // $logger = new \Monolog\Logger('MyApp'); 
            MyLogger2::info("Info test from monolog");

            
            $user = new UserModel(-1, $username, $password);
            
            $service = new SecurityService();
            $status = $service->login($user);
            
            if($status)
            {
                MyLogger2::info("Exit Login5Controller.index() with login passed");
                $data = ['model' => $user];
                return view('loginPassed')->with($data);
            }
            else
            {
                MyLogger2::info("Exit Login5Controller.index() with login failed");
                return view('login5');
            }
        }
        catch(ValidationException $el)
        {
            MyLogger2::error("exception: ". array ("message: " => $el->getMessage()));
            throw $el;
        }
//         catch(Exception $el)
//         {
//             MyLogger1::error("exception: ". array ("message: " => $el->getMessage()));
//             return view("systemException");
//         }
        
    }
    
    private function validateForm(Request $request)
    {
        $rules = ['username' => 'Required | Between: 4, 10 | Alpha',
            'password' => 'Required | Between: 4, 10'];
        
        $this->validate($request, $rules);
    }
}