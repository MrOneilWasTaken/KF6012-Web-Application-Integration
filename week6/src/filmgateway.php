<?php 
    class FilmGateway extends Gateway
    {
        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
            $sql = "SELECT * FROM film";
            $result = $this->getDatabase()->executeSQL($sql);
            $this->setResult($result);
        }

        public function findOne($id){
            $sql = "SELECT * FROM film WHERE film_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }
    }
