<?php      
    include 'config/autoloader.php';
    spl_autoload_register("autoloader");

    $userRequest = new Request("thirdyear/wai/week4/");  

    

  
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
        case 'api/databases':
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
            $films2021 = new Database("db/films2021.sqlite");
            $result = $films2021->executeSQL("SELECT title FROM film WHERE title like :title", ["title"=>"%river%"]);

            $result = $films2021->executeSQL("SELECT actor.first_name AS first, 
            actor.last_name AS last, 
            film.title AS filmtitle, 
            language.name AS languagetitle, 
            category.name AS categoryname
            FROM film 
            INNER JOIN film_actor on (film.film_id = film_actor.film_id) 
            INNER JOIN actor on (film_actor.actor_id = actor.actor_id) 
            INNER JOIN category on (film.category_id = category.category_id)
            INNER JOIN language on (film.language_id = language.language_id) 
            WHERE actor.first_name 
            like :firstname 
            and actor.last_name 
            like :lastname", 
            ["firstname"=>"S%", 
            "lastname"=>"D%"]);

            echo json_encode($result);
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

