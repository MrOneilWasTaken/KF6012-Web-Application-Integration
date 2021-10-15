<?php 
    class Lunchbox
    {
        private $main = "Cheese sandwich";
        private $snack = "Green apple";
        private $drink = "Lemonade";

        /** Returns a description of the items in the lunchbox */

        // public function examine(){
        //     return $this->main . " ". $this->snack . " " . $this->drink;
        // }

        /** Returns a desc of the items in the lunchbox */
        // public function fill($main, $snack, $drink){
        //     $this->main = $main;
        //     $this->snack = $snack;
        //     $this->drink = $drink;
        //     return $this->examine();
        // }

        private function paragraphText($text){
            return "<p>" . $text . "</p>";
        }

        public function getMain(){
            return $this->paragraphText($this->main);
        }

        public function getSnack(){
            return $this->paragraphText($this->snack);
        }

        public function getDrink(){
            return $this->paragraphText($this->drink);
        }

        private function validateText($text){
            return empty(trim($text)) ? "Nothing" : $text;
        }

        public function setMain($main){
            return $this->validateText($this->main);
        }

        public function setSnack($snack){
            return $this->validateText($this->snack);
        }

        public function setDrink($drink){
            return $this->validateText($this->drink);
        }

        public function examine(){
            return $this->getMain() . " " . $this->getSnack() . " " . $this->getDrink();
        }

        public function fill($main, $snack, $drink){
            $this->setMain($main);
            $this->setDrink($snack);
            $this->setDrink($drink);
            return $this->examine();
        }



    }
?>