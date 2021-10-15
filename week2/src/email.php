<?php
    class Email extends Message
    {
        private $subject;

        public function __construct($subject, $text){
            $this->setSubject($subject);
            $this->setText($text);
        }

        public function setSubject($subject){
            $this->subject = $subject;
        }

        public function getSubject(){
            return $this->subject;
        }

        public function getEmail(){
            $subject = $this->getSubject();

            $text = $this->getText();
            return "<h1>Email</h1><p>Subject: $subject</p><p>Text: $text </p>";
        }
    }
?>