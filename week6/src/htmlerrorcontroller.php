<?php 
    class HTMLErrorController extends Controller
    {
        protected function processRequest(){
            $page = new ErrorPage("Erorr", "This page does not exist!");

            return $page->generateWebpage();
        }
    }
