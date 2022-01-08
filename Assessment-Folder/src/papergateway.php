<?php 
    class PaperGateway extends Gateway
    {

        // TO DO: Fix the private SQL thing to work with appending text

        //private $sql = "SELECT * FROM paper";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
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

        public function findAuthor($authorid){
            $sql = "SELECT * 
                    FROM paper 
                    JOIN paper_author on (paper.paper_id = paper_author.paper_id) 
                    JOIN author on (author.author_id = paper_author.author_id)
                    WHERE paper_author.author_id = :author_id"; 
            $params = ["author_id" => $authorid];

            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }

        public function findAward($award){
            $sql = "SELECT * 
                    FROM paper 
                    INNER JOIN award on (paper.paper_id = award.paper_id) 
                    INNER JOIN award_type on (award.award_type_id = award_type.award_type_id)
                    WHERE award.award_type_id= :award_type_id"; 
            $params = ["award_type_id" => $award];

            $result = $this->getDatabase()->executeSQL($sql, $params);
            $this->setResult($result);
        }

        //  TO DO IF AWARD EXIsTS
        // public function findAllAward($hasaward){
        //     $sql = "SELECT *
        //             FROM paper
        //             INNER JOIN award on (paper.paper_id = award.paper_id) 
        //             INNER JOIN award_type on (award.award_type_id = award_type.award_type_id)
        //             ";
        // }
    }
?>