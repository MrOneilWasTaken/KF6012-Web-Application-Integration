<?php
    include 'src/message.php';
    include 'src/email.php';

    $email = new Email("importatnt email!","hello");

    echo $email->getEmail();
?>

