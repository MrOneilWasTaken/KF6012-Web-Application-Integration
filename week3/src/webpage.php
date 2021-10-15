<?php 
    class WebPage
    {
        private $head;

        private $body;

        private $foot;

        public function __construct($title,$heading){
            $this->setHead($title);
            $this->addHeading1($heading);
            $this->setFoot();
        }

        protected function setHead($title){
            $this->head = <<<EOT
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <link rel="preconnect" href="https://fonts.googleapis.com">
                <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed&display=swap" rel="stylesheet">
                <meta charset="UTF-8">
                <link rel="stylesheet" href="assets/style.css">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>$title</title>
            </head>
            <body>
EOT;
        }

        private function getHead(){
            return $this->head;
        }

        protected function setBody($text){
            $this->body .= $text;
        }

        private function getBody(){
            return $this->body;
        }

        protected function setFoot(){
            $this->foot = <<<EOT
            </body>
            </html>
EOT;
        }

        private function getFoot(){
            return $this->foot;
        }    
        
        
        protected function addHeading1($text){
            $this->setBody("<h1>$text</h1>");      
        }

        public function addHeading2($text){
            $this->setBody("<h2>$text</h2>");      
        }

        public function addParagraph($text){
            return $this->setBody("<p>" . $text . "</p>");
        }

        public function addImage($imageName){
            $this->setBody("<img src='assets/$imageName' alt='dog' >");
        }

        public function generateWebpage(){
            return $this->getHead() . " " . $this->getBody() . " " . $this->getFoot();
        }


    }

    
?>
