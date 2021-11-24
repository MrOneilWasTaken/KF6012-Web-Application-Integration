<?php 
    class ApiActorsController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new ActorGateway();
        }

        protected function processRequest(){
            $id = $this->getRequest()->getParameter("id");

            if ($this->getRequest()->getRequestMethod() === "GET"){
                if (!is_null($id)){
                    $this->getGateway()->findOne($id);
                }else{
                    $this->getGateway()->findAll();
                }
            }else{
                $this->getResponse()->setMessage("Method not allowed");
                $this->getResponse()->setStatusCode("405");
            }


            return $this->getGateway()->getResult();
        }
    }
