<?php 
/**
 * Author Gateway API processing
 * 
 * This class connects to the DIS database and executes the appropriate SQL
 * statements to collect the data that is needed on the frontend
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class AuthorGateway extends Gateway
    {
        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        // Function that finds all of the authors and their details within the author table
        public function findAll(){

            $sql = "SELECT * FROM author";

            $result = $this->getDatabase()->executeSQL($sql);

            // For loop that appends  papers to the result that have been co-authored by an author with the ID provided
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["papers"] = $this->getPapers($result[$i]["author_id"]);
            }

            // Set the result that has been created from the SQL statements
            $this->setResult($result);
        }

        // Function that gets an array of Authors that have authored a paper using an ID that is passed into the function
        public function getAuthors($paperID){

            $sqlMultiplePapers = "SELECT author.author_id, author.first_name, author.middle_name, author.last_name FROM author 
                                JOIN paper_author on (author.author_id = paper_author.author_id) 
                                JOIN paper on (paper_author.paper_id = paper.paper_id)
                                WHERE paper.paper_id = :paper_id"; 
                                
            $params = ["paper_id" => $paperID]; 

            return $this->getDatabase()->executeSQL($sqlMultiplePapers, $params);
        }

        // Function that gets an array of awards that a paper has recieved using an ID that is passed into it
        public function getAwards($paperID){

            $sqlMultipleAwards = "  SELECT award.award_type_id, award_type.name FROM award
                                    JOIN award_type ON (award.award_type_id = award_type.award_type_id)
                                    WHERE award.paper_id = :paper_id";

            $params = ["paper_id" => $paperID];  

            return $this->getDatabase()->executeSQL($sqlMultipleAwards, $params);
        }

        // Function that gets an array of papers that an author has authored using their ID
        public function getPapers($authorID){

            $sqlMultiplePapers = "SELECT paper.paper_id, paper.title, paper.abstract FROM paper 
                                JOIN paper_author on (paper.paper_id = paper_author.paper_id) 
                                JOIN author on (author.author_id = paper_author.author_id)
                                WHERE paper_author.author_id = :author_id"; 

            $params = ["author_id" => $authorID]; 

            $result = $this->getDatabase()->executeSQL($sqlMultiplePapers, $params);

            // For loop that appends authors of the paper that has been searched for using the authorID provided 
            // into getPapers
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["authors"] = $this->getAuthors($result[$i]["paper_id"]);
            }

            // For loop that appends awards of the paper that has been searched for using the authorID provided 
            // into getPapers
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["awards"] = $this->getAwards($result[$i]["paper_id"]);
            }

            return $result;
        }

        // Function that  finds one author based on the author ID provided to it
        public function findOne($id){
            $sql =  "SELECT * FROM author WHERE author_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($sql,$params);

            // Set the result that has been created from the SQL statements
            $this->setResult($result);
        }

        // Function that finds authors of a specific paper
        public function findAuthorByPaperID($paperID){
            $sql = "SELECT * FROM paper
                    WHERE paper_id = :paperid";

            $params = ["paperid" => $paperID];

            $result = $this->getDatabase()->executeSQL($sql, $params);

            // For loop that appends authors of the paper that has been searched for using the paperID provided 
            for ($i=0; $i < count($result); $i++) { 
                $result[$i]["authors"] = $this->getAuthors($result[$i]["paper_id"]);
            }

            // Set the result that has been created from the SQL statements
            $this->setResult($result); 
        }
        
    }
?>