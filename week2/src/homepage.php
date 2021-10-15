<?php
    class HomePage Extends WebPage
    {
        public function __construct($title,$h1,$h2){
            
            $this->setHead($title);
            $this->addHeading1($h1);
            $this->addHeading2($h2);
        }

        private function addHeading2($h2){
            $this->setbody("<h2>" . $h2 . "</h2>");
        }

    }
?>