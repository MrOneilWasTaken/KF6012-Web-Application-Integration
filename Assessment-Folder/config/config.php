<?php 
    define('BASEPATH','/webappinterface/KF6012-Web-Application-Integration/Assessment-Folder/');
    define('USERDATABASE', 'db/user.sqlite');
    define('DATABASE', 'db/dis.sqlite');
    define('DEVELOPMENT_MODE', true);

    ini_set('display_errors', DEVELOPMENT_MODE);
    ini_set('display_startup_errors', DEVELOPMENT_MODE);
    
    include 'config/autoloader.php';
    spl_autoload_register("autoloader");

    include 'config/htmlexceptionhandler.php';
    include 'config/jsonexceptionhandler.php';
    set_exception_handler("JSONexceptionHandler");

    include 'config/errorhandler.php';
    set_error_handler("errorHandler");
?>