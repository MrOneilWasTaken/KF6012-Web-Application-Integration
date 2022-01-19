<?php 
/**
 * Reading List API processing
 * 
 * This class processes get requests to the reading list API
 *  
 * @author Sam Oneil w18018623
 *  
 */
    use Firebase\JWT\JWT;
    use Firebase\JWT\Key;

    class ApiReadingListController extends Controller{
        protected function setGateway(){
            $this->gateway = new ListGateway();
        }

       
        protected function processRequest(){

            // Gets the parameters that can be inputted into the API
            $token = $this->getRequest()->getParameter("token");
            $add = $this->getRequest()->getParameter("add");
            $remove = $this->getRequest()->getParameter("remove");

            // Checks if it is the correct method for this endpoint
            // POST is needed for this particular endpoint            
            if($this->getRequest()->getRequestMethod() === "POST"){

                // if the token parameter is passed through 
                if(!is_null($token)){

                    // The secret key is taken from the config
                    $key = SECRET_KEY;

                    // Decode the token using the key and signing algorithm
                    $decoded = JWT::decode($token, new Key($key, 'HS256'));

                    // Get the decoded user_id
                    $user_id = $decoded->user_id;

                    if (!is_null($add)){
                        // If the add parameter exists, call the add method   
                        $this->getGateway()->add($user_id, $add);
                    }elseif (!is_null($remove)){
                        // If the add parameter exists, call the remove method   
                        $this->getGateway()->remove($user_id, $remove);
                    }else{
                        //  If no parameter is given, call the findAll method   
                        $this->getGateway()->findAll($user_id);
                    }
                    
                }else{
                    $this->getResponse()->setMessage("Unauthorised");
                    $this->getResponse()->setStatusCode(401);
                }
            }else{
                $this->getResponse()->setMessage("Method not Allowed");
                $this->getResponse()->setStatusCode(405);
            }
            return $this->getGateway()->getResult();
        }
    }

    


?>