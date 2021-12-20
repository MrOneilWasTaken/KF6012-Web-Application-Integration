<?php 
    class AuthorGateway extends Gateway
    {

        //private $sql = "SELECT * FROM author";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
            $sql = "SELECT * FROM author";
            $result = $this->getDatabase()->executeSQL($sql);
            $this->setResult($result);
        }

        public function findOne($id){
            $sql =  "SELECT * FROM author WHERE author_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($sql,$params);
            $this->setResult($result);
        }
        
    }
?>