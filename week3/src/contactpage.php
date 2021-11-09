<?php
    class ContactPage Extends WebPage
    {
        public function __construct($title,$heading1){
            $this->setHead($title);
            $this->addContact($heading1);
        }

        private function addContact($heading1){
            $this->setbody("<section>" . 
                            "<h1>$heading1</h1>" .
                            "<p>samoneil76@gmail.com</p>" .
                            "<p>50 Kelvin Grove NE2 1RL </p>" .
                            "</section>");
        }

    }
?>