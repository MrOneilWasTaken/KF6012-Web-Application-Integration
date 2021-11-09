<?php
    include 'config/autoloader.php';
    include 'config/exceptionhandler.php';
    include 'config/errorhandler.php';

    set_exception_handler('exceptionHandlerJSON');
    set_error_handler('errorHandler');
    spl_autoload_register("autoloader");
    
    define('BASEPATH', 'webappintegration/week5/');
    define('DATABASE', 'db/films2021.sqlite');
    define('CSSPATH', 'assets/style.css');
    define('DEVELOPMENT_MODE', true);

    ini_set('display_errors', DEVELOPMENT_MODE);
    ini_set('display_startup_errors', DEVELOPMENT_MODE);
?>