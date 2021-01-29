<?php

namespace App\Http\Controllers;

use App\Services\Utility\ILoggerService;

class TestLoggingController extends Controller
{
    protected $logger;
    
    public function __construct(ILoggerService $logger)
    {
        $this->logger = $logger;
    }
    
    public function index()
    {
        echo "in index()<br/>";
        $this->logger->info("Entering TestLoggingController.index()");
        echo "out of index()";
    }
}