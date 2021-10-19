<?php 
    class JSONResponse
    {
        public function settingHeaders(){
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
        }  

        public function printJSON($array){
            return json_encode($array);
        }
    }
?>