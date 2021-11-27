<?php 
    class PaperGateway extends Gateway
    {

        // TO DO: Fix the private SQL thing to work with appending text

        //private $sql = "SELECT * FROM paper";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
            //$result = $this->getDatabase()->executeSQL($this->sql);
            $sql = "SELECT * FROM paper";
            $result = $this->getDatabase()->executeSQL($sql);
            $this->setResult($result);
        }

        public function findOne($id){
            //$this->sql .= "WHERE paper_id = :id";
            $sql = "SELECT * FROM paper WHERE paper_id = :id";
            $params = ["id" => $id];

            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }
    }
?>