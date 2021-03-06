<?php
/**
 * Home HTML page controller
 * 
 * Constructs the home HTML webpage   
 *  
 * @author Sam Oneil w18018623
 *  
 */
class HomeController extends Controller
{
    protected function processRequest()
    {
        $page = new HomePage("Home", "KF6012 Assignment");
        $page->addParagraph("Sam Oneil | W18018623");
        $page->addParagraph("This work is University coursework and not associated with or endorsed by the DIS conference.");
        $page->addLink("http://unn-w18018623.newnumyspace.co.uk/kf6012/coursework/part1/documentation","Link to Documentation Page");
        
        return $page->generateWebpage();
    }
}
