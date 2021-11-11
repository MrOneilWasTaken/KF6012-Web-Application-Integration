<?php 
    class JSONErrorController extends Controller
    {
        protected function processRequest(){
            $data['Message'] = "This URL does not exist";

            return $data;
        }
    }
