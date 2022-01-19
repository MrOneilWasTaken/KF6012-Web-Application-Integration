<?php 
/**
 * JSON error controller
 * 
 * Sends back a response of an empty array upon an an error reponse
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class JSONErrorController extends Controller
    {
        protected function processRequest(){
            $data= [];

            return $data;
        }
    }
