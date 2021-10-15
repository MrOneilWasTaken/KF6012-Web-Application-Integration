<?php
    function includeFile($filename){
        $myfile = "includes" . DIRECTORY_SEPARATOR . "$filename";
        include strtolower($myfile);
    }

    includeFile("webpagehead.php");
    webPageHead("Hello","styles/style.css");

    includeFile("greet.php");

    echo "<h1>" . greet("afternoon", "world") . "</h1>";

    echo "<p class='styley'>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>";

    includeFile("webpagefoot.php");
    webPageFoot();
?>