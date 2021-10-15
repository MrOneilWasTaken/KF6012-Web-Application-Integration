<?php
    function greet($partOfDay, $name){
        $greetingText['morning'] = "Good morning";
        $greetingText['afternoon'] = "Hello";
        $greetingText['evening'] = "Good evening";
        $greetingText['night'] = "Yawn, night night";

        $greeting = $greetingText[$partOfDay];
        
        return "$greeting, $name!";
    }
?>