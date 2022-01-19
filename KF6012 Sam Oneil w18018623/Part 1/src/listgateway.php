<?php 
/**
 * Reading List Gateway API processing
 * 
 * This class connects to the user database and executes the appropriate SQL
 * statements to collect the data that is needed on the frontend
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class ListGateway extends Gateway{
        public function __construct(){
            $this->setDatabase(USER_DATABASE);
        }

        // Function that finds all papers that a user has in their database
        public function findAll($user_id){
            $sql = "SELECT DISTINCT paper_id FROM list WHERE user_id = :user_id";
            $params = [":user_id" => $user_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }

        // Function that adds a paper into the user's database
        public function add($user_id, $paper_id){
            $sql = "INSERT into list (user_id, paper_id) VALUES (:user_id, :paper_id)";
            $params = [":user_id" => $user_id, ":paper_id" => $paper_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
        }

        // Function that removes a paper from a user's database
        public function remove($user_id, $paper_id){
            $sql = "DELETE from list WHERE (user_id = :user_id) AND (paper_id = :paper_id)";
            $params = [":user_id" => $user_id, ":paper_id" => $paper_id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
        }
    }
?>