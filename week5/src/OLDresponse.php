<?php 
    class Request
    {
        private $basepath = BASEPATH;
        private $path;

        
        public function __construct($request){
            $this->setBasepath($request);
            $this->setPath();
        }
        

        protected function setBasepath($request){
            $this->basepath = "$request";
        }

        protected function setPath(){
            $this->path = $this->parsePath();
        }
        
        private function getBasepath(){
            return $this->basepath;
        }
        
        private function getPath(){
            return $this->path;
        }
        

        private function parsePath(){
            $this->url = $_SERVER["REQUEST_URI"];
            $this->path = parse_url($this->url)['path'];
            $this->path = str_replace($this->basepath,"",$this->path);
            $this->path = strtolower($this->path);
            $this->path = trim($this->path,"/");
            return $this->path;
        }

        public function generateRequest(){
            return $this->getPath();
        }

        public function getParameter($param){
            $param = filter_input(INPUT_GET, $param, FILTER_SANITIZE_SPECIAL_CHARS);
            return $param;
        }
    }
?>