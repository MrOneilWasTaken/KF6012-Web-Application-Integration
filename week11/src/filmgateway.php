<?php 
    class FilmGateway extends Gateway
    {
        private $sql = "SELECT film.film_id, film.title, film.description, film.length, film.length, film.rating, 
                        language.name AS language, category.name AS category 
                        FROM film 
                        JOIN language on (film.language_id = language.language_id)
                        JOIN category on (film.category_id =  category.category_id)";

        public function __construct(){
            $this->setDatabase(DATABASE);
        }

        public function findAll(){
            $this->setResult($this->getDatabase()->executeSQL("SELECT film.film_id, film.title, film.description, film.length, film.length, film.rating,language.name AS language, category.name AS category FROM film JOIN language on (film.language_id = language.language_id) JOIN category on (film.category_id =  category.category_id)"));
        }

        // URL has to have "api/films?id=[NUMBER]"
        public function findOne($id){
            $this->sql .= "WHERE film_id = :id";
            $params = ["id" => $id];
            $result = $this->getDatabase()->executeSQL($this->sql, $params);
            $this->setResult($result);
        }

        public function findLanguage($language){
            $this->sql .= "WHERE language.name = :name";
            $params = ["name" => $language];
            $result = $this->getDatabase()->executeSQL($this->sql, $params);
            $this->setResult($result);
        }

        public function findCategory($category){
            $this->sql .= "WHERE category.name = :name";
            $params = ["name" => $category];
            $result = $this->getDatabase()->executeSQL($this->sql, $params);
            $this->setResult($result);
        }

        public function findActor($actorID){
            $this->sql .= "JOIN film_actor on (film.film_id = film_actor.film_id) 
                            JOIN actor on (film_actor.actor_id = actor.actor_id)
                            WHERE film_actor.actor_id = :actor_id";
            
            $params = ["actor_id" => $actorID];
            $result = $this->getDatabase()->executeSQL($this->sql, $params);
            $this->setResult($result);
        }
    }
