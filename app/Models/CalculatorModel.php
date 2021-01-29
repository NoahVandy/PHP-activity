<?php
namespace App\Models;

class CalculatorModel
{
    private $operand1;
    private $operand2;
    
    public function __construct($operand1, $operand2)
    {
        $this->operand1 = $operand1;
        $this->operand2 = $operand2;
    }
    
    /**
     * @return mixed
     */
    public function getOperand1()
    {
        return $this->operand1;
    }

    /**
     * @return mixed
     */
    public function getOperand2()
    {
        return $this->operand2;
    }

    /**
     * @param mixed $operand1
     */
    public function setOperand1($operand1)
    {
        $this->operand1 = $operand1;
    }

    /**
     * @param mixed $operand2
     */
    public function setOperand2($operand2)
    {
        $this->operand2 = $operand2;
    }

    
    
}