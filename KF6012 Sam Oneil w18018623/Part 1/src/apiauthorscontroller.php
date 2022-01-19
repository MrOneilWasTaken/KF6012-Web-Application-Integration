<?php 
/**
 * Author API processing
 * 
 * This class processes get requests to the authors API
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class ApiAuthorsController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new AuthorGateway();
        }

        protected function processRequest(){

            // Gets the parameters that can be inputted into the API
            $id = $this->getRequest()->getParameter("id");
            $paperid = $this->getRequest()->getParameter("paperid");

            // Checks if it is the correct method for this endpoint
            if ($this->getRequest()->getRequestMethod() === "GET"){

                // If the ID parameter exists, call the findOne method
                if (!is_null($id)){
                    $this->getGateway()->findOne($id);

                // If the paperid parameter exists, call the findAuthorByPaperID method   
                }elseif(!is_null($paperid)){
                    $this->getGateway()->findAuthorByPaperID($paperid);
                }else{
                
                // if there are no parameters, the findAll method is called
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