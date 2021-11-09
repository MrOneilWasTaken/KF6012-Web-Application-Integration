<?php 
    class WebPage
    {
        //Establishing variables for each section of HTML -----------------------------------------------------
        private $head;

        private $body;

        private $foot;

        private $cssPath = CSSPATH;

        //Constructor that automatically runs code (Essentialy a void setup() from Java/C) -----------------------------------------------------
        public function __construct($title,$heading){
            $this->setHead($title);
            $this->addHeading1($heading);
            $this->setFoot();
        }

        //Functions that SET the relevent parts of the HTML (Setters) -----------------------------------------------------
        protected function setHead($title){
            $this->head = <<<EOT
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
                <meta charset="UTF-8">
                <link rel="stylesheet" href="$this->cssPath">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>$title</title>
            </head>
            <body>
EOT;
        }

        protected function setBody($text){
            $this->body .= $text;
        }

        protected function setFoot(){
            $this->foot = <<<EOT
            </body>
            </html>
EOT;
        }

        //Functions that GET the relevent parts of the HTML (Getters) -----------------------------------------------------
        private function getBody(){
            return $this->body;
        }
        private function getHead(){
            return $this->head;
        }
        private function getFoot(){
            return $this->foot;
        }    
        
        //Various functions that would be useful for this class -----------------------------------------------------

        //Adds a heading to the body
        protected function addHeading1($text){
            $this->setBody("<h1>$text</h1>");      
        }

        //Adds a smaller heading to the body
        /*
        public function addHeading2($text){
            $this->setBody("<h2>$text</h2>");      
        }*/

        //Adds a paragraph to the body
        public function addParagraph($text){
            return $this->setBody("<p>" . $text . "</p>");
        }

        //Adds an image to the body
        public function addImage($imageName){
            $this->setBody("<img src='assets/$imageName' alt='dog' >");
        }

        //The final function which generates the web page -----------------------------------------------------
        public function generateWebpage(){
            return $this->getHead() . " " . $this->getBody() . " " . $this->getFoot();
        }
    }  
?>
