<?php
    include 'src/webpage.php';
    include 'src/homepage.php';
    include 'src/contactpage.php';

    $homePage = new ContactPage("Title","Heading1");
    
    echo $homePage->generateWebpage();
?>

