<?php 
    include 'src/webpage.php';

    $homepage = new WebPage("Week 3: Index Page", "Creating an API");
    $homepage->addHeading2("This is a dog");
    $homepage->addImage("dog.jpg");
    echo $homepage->generateWebpage();
?>

<script>
    setInterval(function(){location.reload(true);}, 10000);
</script>