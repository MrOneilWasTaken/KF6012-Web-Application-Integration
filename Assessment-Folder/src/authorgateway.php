<?php 
    class AuthorGateway extends Gateway
    {
        public function __construct(){
            $this->setDatabase(DATABASE);
        }
        
    }
?>