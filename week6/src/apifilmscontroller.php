<?php 
    class ApiFilmsController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new FilmGateway();
        }

        protected function processRequest(){
            $id = $this->getRequest()->getParameter("id");
            
            $language = $this->getRequest()->getParameter("language");

            $category = $this->getRequest()->getParameter("category");

            $actorID = $this->getRequest()->getParameter("actor_id");

            if (!is_null($id)){
                $this->getGateway()->findOne($id);
            }elseif (!is_null($language)){
                $this->getGateway()->findLanguage($language);
            }elseif (!is_null($category)){
                $this->getGateway()->findCategory($category);
            }elseif(!is_null($actorID)){
                $this->getGateway()->findActor($actorID);
            }else{
                $this->getGateway()->findAll();
            }

            return $this->getGateway()->getResult();
        }
    }
