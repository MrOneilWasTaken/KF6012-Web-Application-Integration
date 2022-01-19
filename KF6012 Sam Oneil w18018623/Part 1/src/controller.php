<?php 
/**
 * Abstract class for the Controllers
 * 
 * This class sets up the getters and setters required for the other controllers to function
 * The class also handles requests and responses from the client and server
 *  
 * @author Sam Oneil w18018623
 *  
 */
    abstract class Controller
    {
        private $request;
        private $reponse;
        protected $gateway;

        public function __construct($request, $response){
            $this->setGateway();
            $this->setRequest($request);
            $this->setResponse($response);

            $data =  $this->processRequest();
            $this->getResponse()->setData($data);
        }

        private function setRequest($request){
            $this->request = $request;
        }

        protected function getRequest(){
            return $this->request;
        }

        private function setResponse($response){
            $this->response = $response;
        }

        protected function getResponse(){
            return $this->response;
        }

        protected function setGateway(){

        }

        protected function getGateway(){
            return $this->gateway;
        }

        protected function processRequest(){
            
        }
    }
