<?php 
/**
 * Request class
 * 
 * This class gets the url of the api and sanitises the parameters that have been put
 * into the url and determines if the method is GET or POST
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class Request
    {
        private $basepath = BASEPATH;
        private $path;
        private $requestMethod;

        public function __construct(){
            $this->path = parse_url($_SERVER["REQUEST_URI"])['path'];
            $this->path = strtolower(str_replace($this->basepath,"", $this->path));
            $this->path = trim($this->path,"/");
            $this->requestMethod = $_SERVER["REQUEST_METHOD"];
        }

        public function getPath(){
            return $this->path;
        }

        public function getRequestMethod(){
            return $this->requestMethod;
        }

        public function getParameter($param){
            if ($this->getRequestMethod() === "GET"){
                $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            if ($this->getRequestMethod() === "POST"){
                $param = filter_input(INPUT_POST, $param, FILTER_SANITIZE_SPECIAL_CHARS);
            }
            
            return $param;
        }
    }
?>