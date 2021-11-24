<?php
class HomeController extends Controller
{
    protected function processRequest()
    {
        $page = new HomePage("Home", "This is the home page");
        return $page->generateWebpage();
    }
}
