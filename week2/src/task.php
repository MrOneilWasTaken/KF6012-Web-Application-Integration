<?php
    include 'src/webpage.php';
    include 'src/homepage.php';

    $homePage = new HomePage("Title","Heading1","Heading2");
    
    echo $homePage->generateWebpage();
?>

