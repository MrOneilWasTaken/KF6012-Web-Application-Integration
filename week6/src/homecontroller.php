<?php
class HomeController extends Controller
{
    protected function processRequest()
    {
        $page = new HomePage("Home", "WAHT");
        return $page->generateWebpage();
    }
}
