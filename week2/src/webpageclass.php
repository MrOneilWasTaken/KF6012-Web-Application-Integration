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
                <meta charset="UTF-8">
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

        protected function getBody(){
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
            $this->setBody($this->getBody() . "<h1>$text</h1>");      
          }

        public function addParagraph($text){
            return $this->setBody("<p>" . $text . "</p>");
        }

        public function generateWebpage(){
            return $this->getHead() . " " . $this->getBody() . " " . $this->getFoot();
        }


    }
?>
