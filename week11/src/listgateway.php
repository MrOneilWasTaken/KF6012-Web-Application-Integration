<?php 
    class ListGateway extends Gateway{
        public function __construct(){
            $this->setDatabase(USER_DATABASE);
        }

        public function findAll($user_id){
            $sql = "SELECT DISTINCT film_id FROM list WHERE user_id = :user_id";
            $params = [":user_id" => $user_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }

        public function add($user_id, $film_id){
            $sql = "INSERT into list (user_id, film_id) VALUES (:user_id, :film_id)";
            $params = [":user_id" => $user_id, ":film_id" => $film_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
        }

        public function remove($user_id, $film_id){
            $sql = "DELETE from list WHERE (user_id = :user_id) AND (film_id = :film_id)";
            $params = [":user_id" => $user_id, ":film_id" => $film_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
        }
    }
?>