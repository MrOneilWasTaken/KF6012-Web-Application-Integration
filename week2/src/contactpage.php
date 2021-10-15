<?php
    class ContactPage Extends WebPage
    {
        public function __construct($title,$heading1){
            $this->setHead($title);
            $this->addContact();
        }

        private function addContact(){
            $this->setbody("<section>" . 
                            "<h1> This is a Heading </h1>" .
                            "<p>samoneil76@gmail.com</p>" .
                            "<p>50 Kelvin Grove NE2 1RL </p>" .
                            "</section>");
        }

    }
?>