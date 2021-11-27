<?php 
    class HTMLErrorController extends Controller
    {
        protected function processRequest(){
            $page = new ErrorPage("Error", "This page does not exist!");
            $page->addLink("http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/","Link back to the Home page");

            return $page->generateWebpage();
        }
    }
