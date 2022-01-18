<?php 
    class ApiAuthorsController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new AuthorGateway();
        }

        protected function processRequest(){
            $id = $this->getRequest()->getParameter("id");
            $paperid = $this->getRequest()->getParameter("paperid");

            if ($this->getRequest()->getRequestMethod() === "GET"){
                if (!is_null($id)){
                    $this->getGateway()->findOne($id);
                }elseif(!is_null($paperid)){
                    $this->getGateway()->findAuthorByPaperID($paperid);
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