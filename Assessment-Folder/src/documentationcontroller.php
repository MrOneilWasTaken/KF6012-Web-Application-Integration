<?php 
    class DocumentationController extends Controller
    {
        protected function processRequest(){
            $page = new DocumentationPage("Documentation","Documentation for KF6012 Assignment");
            $page->addParagraph("Sam Oneil | W18018623");
            $page->addLink("http://localhost/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/","Link to Home Page");
            $page->addParagraph("Endpoint 1: /api");
            $page->addParagraph("This endpoint contains student name and ID, a short explenation of what the API is and information on how to access the documentation for the API.");
            $page->addParagraph("Endpoint 2: /api/authors");
            $page->addParagraph("This endpoint returns an array of authors. Each item in the array lists the author's name and author ID.");
            $page->addParagraph("This endpoint supports the use of ID searching, e.g. /api/authors?id=8032");
            $page->addParagraph("Endpoint 3: /api/papers");
            $page->addParagraph("This endpoint returns an array of academic papers. Each item includes the ID of the paper, title, abstract and awards.");
            $page->addParagraph("This endpoint supports the use of ID searching, e.g. /api/papers?id=50");
            $page->addParagraph("As well as author ID searching, e.g. /api/papers?authorid=8032");
            $page->addParagraph("As well as searching which papers have won an award, e.g. /api/papers?award=all");
            return $page->generateWebpage();
        }
    }
