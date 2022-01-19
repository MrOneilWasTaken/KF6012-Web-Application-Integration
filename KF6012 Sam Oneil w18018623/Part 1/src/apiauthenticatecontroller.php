<?php 
/**
 * Password verification
 * 
 * This class verifies if the password inputted into the login page
 * is matches what it should be when compared to the hashed password within the database
 * 
 * @author Sam Oneil w18018623
 *  
 */
    use Firebase\JWT\JWT;

    class ApiAuthenticatecontroller extends Controller {

        protected function setGateway(){
            $this->gateway = new UserGateway();
        }

        protected function processRequest(){
            $data = [];

            //Getting parameters
            
            //$id = $this->getRequest()->getParameter("id");
            $email = $this->getRequest()->getParameter("email");
            $password = $this->getRequest()->getParameter("password");

            if ($this->getRequest()->getRequestMethod() === "POST"){

                //Check if the params are null
                //else return a 401 status code
                if (!is_null($email) && !is_null($password)){

                    //Using findPassword method to find password
                    //accosiated with email address provided
                    $this->getGateway()->findPassword($email);

                    //If there is a result then the email matched with
                    //an email in the db we can get the hashed password for that user
                    if (count($this->getGateway()->getResult()) == 1){

                        //Storing the user ID and hashed password that is attributed to the ID
                        $hashpassword = $this->getGateway()->getResult()[0]['password'];
                        $user_id = $this->getGateway()->getResult()[0]['id'];

                        //If the password is verified to be correct
                        //create a JSON web token for the logged in user
                        if (password_verify($password, $hashpassword)){
                            $key = SECRET_KEY;

                            $payload = array(
                                "user_id" => $user_id,
                                "exp" => time() + 7776000
                            );

                            // Encodes the payload containing the user ID using
                            // the secret unique key and signing algorithm
                            $jwt = JWT::encode($payload, $key, 'HS256');
                            $data = ['token' => $jwt];
                        }
                    }
                }
                
                //If the token and its data is empty, provide an error
                if(!array_key_exists('token',$data)){
                    $this->getResponse()->setMessage("Unauthorised");
                    $this->getResponse()->setStatusCode(401);

                }

            }else{
                $this->getResponse()->setMessage("Method not allowed");
                $this->getResponse()->setStatusCode(405);
            }

            return $data;
        }
    }
?>