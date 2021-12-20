<?php 
    class ApiPapersController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new PaperGateway();
        }
        
        protected function processRequest(){
            $id = $this->getRequest()->getParameter("id");
            $authorid = $this->getRequest()->getParameter("authorid");
            $award = $this->getRequest()->getParameter("award");

            if ($this->getRequest()->getRequestMethod() === "GET"){
                if (!is_null($id)){
                    $this->getGateway()->findOne($id);
                }elseif(!is_null($authorid)){
                    $this->getGateway()->findAuthor($authorid);
                }elseif(!is_null($award)){
                    $this->getGateway()->findAward($award);
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