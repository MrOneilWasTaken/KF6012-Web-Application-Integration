<?php 
/**
 * Abstract Response class 
 * 
 * This class sets up setters and getters for the response 
 *  
 * @author Sam Oneil w18018623
 *  
 */
    abstract class Response{
        protected $data;

        public function __construct(){
            $this->headers();
        }

        public function setData($data){
            $this->data = $data;
        }

        public function getData(){
            return $this->data;
        }

        protected function headers(){
            
        }
    }
?>