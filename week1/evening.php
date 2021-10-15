<?php

    function includeFile($filename){
        $myfile = "includes" . DIRECTORY_SEPARATOR . "$filename";
        include strtolower($myfile);
    }


    includeFile("webpagehead.php");
    webPageHead("Evening","styles/style.css");

    includeFile("greet.php");

    echo "<h1>" . greet("evening", "world") . "</h1>";

    echo "<p class='styley'>sleep</p>";

    includeFile("webpagefoot.php");
    webPageFoot();
?>