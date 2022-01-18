<?php 
    class PaperGateway extends Gateway
    {
        private $sql = "SELECT paper.paper_id, title, abstract, doi, video, preview FROM paper 
                        JOIN award on (paper.paper_id = award.paper_id) 
                        JOIN award_type on (award.award_type_id = award_type.award_type_id)";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function getAwards($paperID){
            $sqlMultipleAwards = "  SELECT award.award_type_id, award_type.name FROM award
                                    JOIN award_type ON (award.award_type_id = award_type.award_type_id)
                                    WHERE award.paper_id = :paper_id";
            $params = ["paper_id" => $paperID];  
            return $this->getDatabase()->executeSQL($sqlMultipleAwards, $params);
        }

        public function getPapers($authorID){
            $sqlMultiplePapers = "SELECT paper.paper_id, paper.title, paper.abstract FROM paper 
                                JOIN paper_author on (paper.paper_id = paper_author.paper_id) 
                                JOIN author on (author.author_id = paper_author.author_id)
                                WHERE paper_author.author_id = :author_id"; 
            $params = ["author_id" => $authorID]; 
            return $this->getDatabase()->executeSQL($sqlMultiplePapers, $params);
        }

        public function getAuthors($paperID){
            $sqlMultiplePapers = "SELECT author.author_id, author.first_name, author.middle_name, author.last_name FROM author 
                                JOIN paper_author on (author.author_id = paper_author.author_id) 
                                JOIN paper on (paper_author.paper_id = paper.paper_id)
                                WHERE paper.paper_id = :paper_id"; 
            $params = ["paper_id" => $paperID]; 
            return $this->getDatabase()->executeSQL($sqlMultiplePapers, $params);
        }

        public function findAll(){

            $sql = "SELECT * FROM paper";

            $result = $this->getDatabase()->executeSQL($sql);

            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["awards"] = $this->getAwards($result[$i]["paper_id"]);
            }

            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["authors"] = $this->getAuthors($result[$i]["paper_id"]);
            }

            $this->setResult($result);
        }

        public function findOne($id){
            $sql = "SELECT * FROM paper WHERE paper.paper_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($sql, $params);
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["awards"] = $this->getAwards($result[$i]["paper_id"]);
            }
            $this->setResult($result);
        }

        public function findAuthor($authorid){
            $sql = "SELECT * FROM author
                    WHERE author_id = :author_id";
            
            $params = ["author_id" => $authorid];

            $result = $this->getDatabase()->executeSQL($sql, $params);
        
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["papers"] = $this->getPapers($authorid);
            }
            $this->setResult($result);
        }

        public function findAward($award){  
            if($award === "all"){
                $this->sql .= "WHERE award_type.name IS NOT NULL "; 

                $result = $this->getDatabase()->executeSQL($this->sql);

                for ($i=0; $i < count($result); $i++) { 
                    $result[$i]["awards"] = $this->getAwards($result[$i]["paper_id"]);
                }
              
                $this->setResult($result);
            }else{ 

                $this->sql .= "WHERE award_type.name IS NOT NULL AND award.award_type_id = :award_type_id"; 

                $params = ["award_type_id" => $award];

                $result = $this->getDatabase()->executeSQL($sql,$params);

                for ($i=0; $i < count($result); $i++) { 
                    $result[$i]["awards"] = $this->getAwards($result[$i]["paper_id"]); 
                } 
                $this->setResult($result);
            }      
        }
    }
?>