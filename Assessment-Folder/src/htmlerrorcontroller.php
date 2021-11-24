<?php 
    class HTMLErrorController extends Controller
    {
        protected function processRequest(){
            $page = new ErrorPage("Error", "This page does not exist!");

            return $page->generateWebpage();
        }
    }
