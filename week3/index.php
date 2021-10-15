<?php      
    include 'src/functions.php';
    include 'src/webpage.php';
    include 'src/homepage.php';
    include 'src/contactpage.php';
    include 'src/Request.php';
    include 'src/JSONResponse.php';

    $url = $_SERVER["REQUEST_URI"];

    $basepath= "/webappintegration/week3/";

    $path = parse_url($url)['path'];
    $path = str_replace($basepath,"",$path);
    $path = strtolower($path);
    $path = trim($path,"/");

    switch($path){
        case '':
        case 'home':
            $homePage = new HomePage("Week 3: Index Page", "Creating an API","This isnt a dog");
            $homePage->addImage("dog.jpg");
            echo $homePage->generateWebpage();
            break;
        case 'contact':
            $contactPage = new ContactPage("Week 3: Contact Page", "Paths");
            $contactPage->addImage("cat.png");
            echo $contactPage->generateWebpage();
            break;
        case 'documentation':
        case 'docs':
            $docPage = new WebPage("Week 3: Documentation Page", "Documentation");
            $docPage->addParagraph("This is a frog");
            $docPage->addImage("screamingfrog.jpg");
            echo $docPage->generateWebpage();
            break;
        case 'api':
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
            $myArray['name'] = "SamOneil";
            $myArray['studentID'] = "w18018623";
            $myArray['documentationURL'] = "/webappintegration/week3/documentation";
            $myArray['contactURL'] = "/webappintegration/week3/contact";
            echo json_encode($myArray);
            break;
        case 'api/meals':
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
            $myArray['breakfast'] = "Boiled eggs";
            $myArray['lunch'] = "Scrambled eggs";
            $myArray['dindins'] = "Fried eggs";
            echo json_encode($myArray);
            break;
        case 'api/topics':
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
            $myArray['week1'] = "PHP Basics";
            $myArray['week2'] = "Object Oriented PHP";
            $myArray['week3'] = "Web API";
            $myArray['week4'] = "SQLite Databases";
            echo json_encode($myArray);
            break;
        default:
            echo "Error 404 page not found";
            break;
    }
    //autoRefresh();
?>

