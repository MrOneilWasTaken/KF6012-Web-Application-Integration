<?php 
/**
 * Papers API processing
 * 
 * This class processes get requests to the papers API
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class ApiPapersController extends Controller
    {
        protected function setGateway(){
            $this->gateway = new PaperGateway();
        }
        
        protected function processRequest(){

            // Gets the parameters that can be inputted into the API
            $id = $this->getRequest()->getParameter("id");
            $authorid = $this->getRequest()->getParameter("authorid");
            $award = $this->getRequest()->getParameter("award");

            // Checks if it is the correct method for this endpoint
            if ($this->getRequest()->getRequestMethod() === "GET"){

                // If the ID parameter exists, call the findOne method
                if (!is_null($id)){
                    $this->getGateway()->findOne($id);

                // If the authorid parameter exists, call the findAuthor method   
                }elseif(!is_null($authorid)){
                    $this->getGateway()->findAuthor($authorid);

                // If the award parameter exists, call the findAward method   
                }elseif(!is_null($award)){
                    $this->getGateway()->findAward($award);
                
                // If no parameter is given, call the findAll method   
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