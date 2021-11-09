<?php
    function exceptionHandlerHTML($e){
        if (DEVELOPMENT_MODE) {
            $errorFile = fopen("logs/HTMLerror.txt","w");
        
            fwrite($errorFile, "Internal server error!\n");
            fwrite($errorFile, "Message: " . $e->getMessage() . "\n");
            fwrite($errorFile, "File: " . $e->getFile() . "\n");
            fwrite($errorFile, "Line: " . $e->getLine() . "\n");
            fclose($errorFile);
    
            echo "Internal server error! <br>";
            echo " Message: ".$e->getMessage() . "<br>";
            echo " File: ".$e->getFile() . "<br>";
            echo " Line: ".$e->getLine() . "<br>";
        }else{
            echo "Internal Server Error (status code 500)";
        }
    }

    function exceptionHandlerJSON($e){
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
        header("Content-Type: application/json; charset=UTF-8");

        if (DEVELOPMENT_MODE){
            $errorFile = fopen("logs/JSONerror.txt","w");

            fwrite($errorFile, "Internal server error!\n");
            fwrite($errorFile, "Message: " . $e->getMessage() . "\n");
            fwrite($errorFile, "File: " . $e->getFile() . "\n");
            fwrite($errorFile, "Line: " . $e->getLine() . "\n");
            fclose($errorFile);
    
            $jsonArray['error type'] = "Internal server error!";
            $jsonArray['message'] = $e->getMessage();
            $jsonArray['file'] = $e->getFile();
            $jsonArray['line'] =  $e->getLine();

            echo json_encode($jsonArray);
        }else{
            $jsonArray['error type'] = "Internal Server Error (status code 500)";
            echo json_encode($jsonArray);
        }
    }
?>