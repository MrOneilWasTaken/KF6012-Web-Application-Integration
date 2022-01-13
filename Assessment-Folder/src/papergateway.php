<?php 
    class PaperGateway extends Gateway
    {
        private $sql = "SELECT paper.paper_id, paper.title, paper.abstract, paper.doi, paper.video, paper.preview, award_type.name AS Award  FROM paper 
                        LEFT JOIN award on (paper.paper_id = award.paper_id) 
                        LEFT JOIN award_type on (award.award_type_id = award_type.award_type_id)";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
            $result = $this->getDatabase()->executeSQL($this->sql);
            $this->setResult($result);
        }

        public function findOne($id){
            $this->sql .= "WHERE paper.paper_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($this->sql, $params);
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

        // TO DO 
        // Sort this fuckin award shit out

        public function getAwards($paper){
            $sqlMultipleAwards = "  SELECT award.paper_id, award.award_type_id, award_type.name AS Award FROM award
                                    JOIN award_type ON (award.award_type_id = award_type.award_type_id)
                                    WHERE award.paper_id = :paper_id";

            $params = ["paper_id" => $paper];
            
            return $this->getDatabase()->executeSQL($sqlMultipleAwards, $params);
        }

        public function findAward($award){
            $sql = "SELECT paper.paper_id, paper.title, paper.abstract, paper.doi, paper.video, paper.preview 
                    FROM paper
                    "; 

            // JOIN award on (paper.paper_id = award.paper_id) 
            // JOIN award_type on (award.award_type_id = award_type.award_type_id)
            // WHERE award_type.name IS NOT NULL
        
            $result = $this->getDatabase()->executeSQL($sql);
            foreach($result as $papers => $paper){
                $paper["awards"] = $this->getAwards($papers);
            }
            $this->setResult($result);
        }
    }
?>