<?php 
/**
 * HTMLError controller
 * 
 * This class creates a response webpage that lets the use know that there has been error  
 *  
 * @author Sam Oneil w18018623
 *  
 */
    class HTMLErrorController extends Controller
    {
        protected function processRequest(){
            $page = new ErrorPage("Error", "This page does not exist!");
            $page->addLink("http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/","Link back to the Home page");

            return $page->generateWebpage();
        }
    }
