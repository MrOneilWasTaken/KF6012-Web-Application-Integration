<?php 
/**
 * Base API processing
 * 
 * This class handles the base api path which contains basic information about the API
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class ApiBaseController extends Controller
    {
        protected function processRequest(){
            $data['author']['name'] = "My name";
            $data['author']['id'] = "w18018623";
            $data['message'] = "This API is designed to retrieve papers based on different values";
            $data['documentation'] = "Go to '/documentation' for more information";

            return $data;
        }
    }
