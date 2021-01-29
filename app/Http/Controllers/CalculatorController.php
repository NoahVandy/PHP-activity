<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CalculatorModel;
use App\Services\Business\CalculatorService;
use Dotenv\Exception\ValidationException;

class CalculatorController extends Controller
{
    public function onSubmitAdd(Request $request)
    {
        try{
            $this->validateForm($request);
            $operand1 = $request->input("operand1");
            $operand2 = $request->input("operand2");
            
            $calcModel = new CalculatorModel($operand1, $operand2);
            
            $service = new CalculatorService();
            $result = $service->add($calcModel);
            
            $data = ['result' => $result];
            return view('CalculatorResultView')->with($data);
        }
        catch(ValidationException $el){
            throw $el;
        }
        
    }
    
    public function onSubmitSubtract(Request $request)
    {
        try{
            $this->validateForm($request);
            $operand1 = $request->input("operand1");
            $operand2 = $request->input("operand2");
            
            $calcModel = new CalculatorModel($operand1, $operand2);
            
            $service = new CalculatorService();
            $result = $service->subtract($calcModel);
            
            $data = ['result' => $result];
            return view('CalculatorResultView')->with($data);
        }
        catch(ValidationException $el){
            throw $el;
        }
        
    }
    
    public function onSubmitMultiply(Request $request)
    {
        try{
            $this->validateForm($request);
            $operand1 = $request->input("operand1");
            $operand2 = $request->input("operand2");
            
            $calcModel = new CalculatorModel($operand1, $operand2);
            
            $service = new CalculatorService();
            $result = $service->multiply($calcModel);
            
            $data = ['result' => $result];
            return view('CalculatorResultView')->with($data);
        }
        catch(ValidationException $el){
            throw $el;
        }
        
    }
    
    public function onSubmitDivide(Request $request)
    {
        try{
            $this->validateForm($request);
            $operand1 = $request->input("operand1");
            $operand2 = $request->input("operand2");
            
            $calcModel = new CalculatorModel($operand1, $operand2);
            
            $service = new CalculatorService();
            $result = $service->divide($calcModel);
            
            $data = ['result' => $result];
            return view('CalculatorResultView')->with($data);
        }
        catch(ValidationException $el){
            throw $el;
        }
        
    }
    
    
    private function validateForm(Request $request)
    {
        $rules = ['operand1' => 'Required | Between: 1, 10',
            'operand2' => 'Required | Between: 1, 10'];
        
        $this->validate($request, $rules);
    }
}