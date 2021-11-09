<?php      
    include 'config/autoloader.php';
    spl_autoload_register("autoloader");

    $userRequest = new Request("/webappintegration/week3/");  
  
    switch($userRequest->generateRequest()){
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
            $api = new JSONResponse();
            $api->settingHeaders();
            
            $myArray['name'] = "SamOneil";
            $myArray['studentID'] = "w18018623";
            $myArray['documentationURL'] = "/webappintegration/week3/documentation";
            $myArray['contactURL'] = "/webappintegration/week3/contact";

            echo $api->printJSON($myArray);
            break;
        case 'api/meals':
            $apiMeals = new JSONResponse();
            $apiMeals->settingHeaders();

            $myArray['breakfast'] = "Boiled eggs";
            $myArray['lunch'] = "Scrambled eggs";
            $myArray['dindins'] = "Fried eggs";
            
            echo $apiMeals->printJSON($myArray);
            break;
        case 'api/topics':
            $apiTopics = new JSONResponse();
            $apiTopics->settingHeaders();
            
            $myArray['week1'] = "PHP Basics";
            $myArray['week2'] = "Object Oriented PHP";
            $myArray['week3'] = "Web API";
            $myArray['week4'] = "SQLite Databases";

            echo $apiTopics->printJSON($myArray);
            break;
        default:
            $apiError = new JSONResponse();
            $apiError->settingHeaders();

            $myArray['Error Message'] = "Page not found";

            if (substr($userRequest->generateRequest(),0,4) == "api/"){
                echo $apiError->printJSON($myArray);
            }else{
                echo "Error 404 page not found";
            }
                   
            break;
    }
    //autoRefresh();
?>

