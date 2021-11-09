<?php      

    include 'config/config.php';
    

    $request = new Request();  

    $response = (substr($request->getPath(),0,3) === "api")
        ? new JSONResponse()
        : new HTMLResponse();
  
    switch($request->getPath()){
        case '':
        case 'home':
            set_exception_handler('exceptionHandlerHTML');
            $homePage = new HomePage("Week 5: Index Page", "Exception Handling","This dog lies");
            $homePage->addImage("dog.jpg");  

            
            $response = new HTMLResponse($homePage->generateWebpage());  
            echo $response->getData();
            

            //echo $homePage->generateWebpage();

            break;
        case 'documentation':
            $docPage = new WebPage("Week 3: Documentation Page", "Documentation");
            $docPage->addParagraph("This is a frog");
            $docPage->addImage("screamingfrog.jpg");
            echo $docPage->generateWebpage();
            break;
        case 'api':
            $myArray['name'] = "SamOneil";
            $myArray['studentID'] = "w18018623";
            $myArray['documentationURL'] = "/webappintegration/week3/documentation";
            $myArray['contactURL'] = "/webappintegration/week3/contact";

            $response = new JSONReponse($myArray);

            echo $reponse->getData();
            break;

        case 'api/databases':
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Methods: GET");
            header("Access-Control-Max-Age: 3600");
            header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,Authorization, X-Requested-With");
            header("Content-Type: application/json; charset=UTF-8");
            $films2021 = new Database(DATABASE);
            $result = $films2021->executeSQL("SELECT title FROM film WHERE title like :title", ["title"=>"%river%"]);

            $result = $films2021->executeSQL(
            "SELECT actor.first_name AS first, 
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
        
        case 'api/actors':

            $films2021 = new Database(DATABASE);
            $id = $request->getParameter("id");
            $result = $films2021->executeSQL("SELECT first_name, last_name
                                            FROM actor
                                            WHERE actor_id = :id",
                                            ['id'=>$id]);
            //$respond = new JSONResponse($result);
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

