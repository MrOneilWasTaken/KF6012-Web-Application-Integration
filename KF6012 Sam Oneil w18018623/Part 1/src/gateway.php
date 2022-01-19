<?php 
/**
 * Abstract class for the gateways
 * 
 * This class acts the base gateway for communication to the database
 * and getting and setting results
 *  
 * @author Sam Oneil w18018623
 *  
 */
    abstract class Gateway
    {
        private $database;
        private $result;

        protected function setDatabase($database){
            $this->database = new Database($database);
        }

        protected function getDatabase(){
            return $this->database;
        }

        protected function setResult($result){
            $this->result = $result;
        }

        public function getResult(){
            return $this->result;
        }
    }
