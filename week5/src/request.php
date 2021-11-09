<?php 
    class Request
    {
        private $basepath = BASEPATH;
        private $path;

        
        public function __construct(){
            $this->path = parse_url($_SERVER["REQUEST_URI"])['path'];
            $this->path = strtolower(str_replace($this->basepath, "", $this->path));
            $this->path = trim($this->path,"/");
        }
        
        
        public function getPath(){
            return $this->path;
        }
        

        public function getParameter($param){
            $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
        }
    }
?>