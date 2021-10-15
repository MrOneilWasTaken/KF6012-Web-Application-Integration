<?php
    class HomePage extends WebPage
    {
        public function __construct($title,$h1,$h2){
            $this->setHead($title);
            $this->addHeading1($h1);
            $this->addHeading2($h2);
        }

        private function addHeading2($h2){
            return "<h2>" . $this->setBody($h2) . "</h2>";
        }

    }
?>