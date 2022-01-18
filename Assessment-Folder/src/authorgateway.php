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

        public function getAuthors($paperID){
            $sqlMultiplePapers = "SELECT author.author_id, author.first_name, author.middle_name, author.last_name FROM author 
                                JOIN paper_author on (author.author_id = paper_author.author_id) 
                                JOIN paper on (paper_author.paper_id = paper.paper_id)
                                WHERE paper.paper_id = :paper_id"; 
            $params = ["paper_id" => $paperID]; 
            return $this->getDatabase()->executeSQL($sqlMultiplePapers, $params);
        }

        public function findOne($id){
            $sql =  "SELECT * FROM author WHERE author_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($sql,$params);
            $this->setResult($result);
        }

        public function findAuthorByPaperID($paperID){
            $sql = "SELECT * FROM paper
                    WHERE paper_id = :paperid";

            $params = ["paperid" => $paperID];

            $result = $this->getDatabase()->executeSQL($sql, $params);


            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["authors"] = $this->getAuthors($result[$i]["paper_id"]);
            }


            $this->setResult($result); 
        }
        
    }
?>