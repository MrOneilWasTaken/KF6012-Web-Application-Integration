<?php 
    include "config/config.php";

    $request = new Request();

    if (substr($request->getPath(),0,3) === "api"){
        $response = new JSONResponse();
    }else{
        set_exception_handler("HTMLexceptionHandler");
        $response = new HTMLResponse();
    }

    switch ($request->getPath()){
        case '':
        case 'home':

            break;
        case 'documentation':
            echo "documentation";
            break;
        case 'api':
            $controller = new ApiBaseController($request, $response);
            break;
        case 'api/films':
            echo "api/films";
            break;
        case 'api/actors':
            break;
        default:
            break;
    }

    echo $response->getData();
?>