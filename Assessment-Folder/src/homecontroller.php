<?php
class HomeController extends Controller
{
    protected function processRequest()
    {
        $page = new HomePage("Home", "KF6012 Assignment");
        $page->addParagraph("Sam Oneil | W18018623");
        $page->addParagraph("This work is University coursework and not associated with or endorsed by the DIS conference.");
        $page->addLink("http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/documentation","Link to Documentation Page");
        
        return $page->generateWebpage();
    }
}
