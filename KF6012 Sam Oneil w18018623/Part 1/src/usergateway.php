<?php 
/**
 * User Gateway API processing
 * 
 * This class connects to the user database and executes
 * SQL queries
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class UserGateway extends Gateway{
        public function __construct(){
            $this->setDatabase(USER_DATABASE);
        }

        public function findPassword($email){
            $sql = "SELECT id, password FROM user WHERE email = :email";
            $params = [":email" => $email];
            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }
    }
?>