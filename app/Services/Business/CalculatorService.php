<?php
namespace App\Services\Business;

class CalculatorService
{
    public function add($calcModel)
    {
        $result = $calcModel->getOperand1() + $calcModel->getOperand2();
        
        return $result;
    }
    
    public function subtract($calcModel)
    {
        $result = $calcModel->getOperand1() - $calcModel->getOperand2();
        
        return $result;
    }
    
    public function multiply($calcModel)
    {
        $result = $calcModel->getOperand1() * $calcModel->getOperand2();
        
        return $result;
    }
    
    public function divide($calcModel)
    {
        $result = $calcModel->getOperand1() / $calcModel->getOperand2();
        
        return $result;
    }
}
