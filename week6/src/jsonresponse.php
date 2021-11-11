<?php
    class JSONResponse extends Response
    {
        private $message;
        
        protected function headers(){
            header("Access-Control-Allow-Origin: *");
            header("Content-Type: application/json; charset=UTF-8");
        }

        public function getData(){
            $response['message'] = $this->message;
            $response['count'] = count($this->data);
            $response['results'] = $this->data;
            if (sizeof($this->data) > 0){
                $response['message'] = "Search completed";
            }else{
                $response['message'] = "No content";
            }
            return json_encode($response);
        }
    }
 ?>