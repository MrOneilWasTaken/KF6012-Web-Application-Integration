<?php 
    class ApiPapersController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new PaperGateway();
        }
        
        protected function processRequest(){
            $id = $this->getRequest()->getParameter("id");
            $author_id = $this->getRequest()->getParameter("author_id");
            $award = $this->getRequest()->getParameter("award");

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
?>