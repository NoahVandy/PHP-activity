<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test()
    {
        return "testing 123";
    }
    
    public function test2()
    {
        return view('HelloWorld');
    }
}