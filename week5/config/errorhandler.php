<?php 
    function errorHandler($errno, $errstr, $errfile, $errline){
        header("Acess-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");

        if (DEVELOPMENT_MODE){
            throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline",1);
        }else{
            if ($errno != 2 && $errno != 8){
            throw new Exception("Error Detected: [$errno] $errstr file: $errfile line: $errline",1);          
            }
        $message["message"] = "Error Detected: [$errno] $errstr file: $errfile line: $errline";
        echo json_encode($message);
        } 
    }
?>