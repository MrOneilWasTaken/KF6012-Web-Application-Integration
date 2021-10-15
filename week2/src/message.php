<?php
    class Message
    {
        private $text;

        public function __construct($text){
            $this->setText($text);
        }

        protected function setText($text){
            $this->text = $text;
        }
        
        protected function getText(){
            return $this->text;
        }

        public function getMessage(){
            return "<h1>Message</h1><p>" . $this->getText() . "</p>";
        }
    }
?>