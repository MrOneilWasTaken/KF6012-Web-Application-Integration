<?php

    function includeFile($filename){
        $myfile = "includes" . DIRECTORY_SEPARATOR . "$filename";
        include strtolower($myfile);
    }


    includeFile("webpagehead.php");
    webPageHead("Morning","styles/style.css");

    includeFile("greet.php");

    echo "<h1>" . greet("morning", "world") . "</h1>";

    echo "<p class='styley'>The quick brown fox jumped over the lazy dog</p>";

    includeFile("webpagefoot.php");
    webPageFoot();
?>