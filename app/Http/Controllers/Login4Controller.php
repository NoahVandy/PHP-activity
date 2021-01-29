<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use App\Services\Business\SecurityService;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Login4Controller extends Controller
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
            Log::info("Parameters: ", array("username" => $username, " password: " => $password));
            
            $user = new UserModel(-1, $username, $password);
            
            $service = new SecurityService();
            $status = $service->login($user);
            
            if($status)
            {
                Log::info("Exit Login4controller.index() with login passed");
                $data = ['model' => $user];
                return view('loginPassed')->with($data);
            }
            else
            {
                Log::info("Exit Login4controller.index() with login failed");
                return view('loginFailed');
            }
        }
        catch(ValidationException $el)
        {
            Log::error("exception: ". array ("message: " => $el->getMessage()));
            throw $el;
        }
        
    }
    
    private function validateForm(Request $request)
    {
        $rules = ['username' => 'Required | Between: 4, 10 | Alpha',
            'password' => 'Required | Between: 4, 10'];
        
        $this->validate($request, $rules);
    }
}