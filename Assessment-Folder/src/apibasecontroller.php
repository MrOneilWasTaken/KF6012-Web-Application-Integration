<?php 
    class ApiBaseController extends Controller
    {
        protected function processRequest(){
            $data['author']['name'] = "My name";
            $data['author']['id'] = "w18018623";
            $data['message'] = "This is a basic web API";
            $data['documentation'] = "http://www.google.com";

            return $data;
        }
    }
