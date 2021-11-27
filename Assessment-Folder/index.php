<?php
include "config/config.php";

$request = new Request();

if (substr($request->getPath(), 0, 3) === "api") {
    $response = new JSONResponse();
} else {
    set_exception_handler("HTMLexceptionHandler");
    $response = new HTMLResponse();
}

switch ($request->getPath()) {
    case '':
    case 'home':
        $controller = new HomeController($request, $response);
        break;
    case 'documentation':
        $controller = new DocumentationController($request, $response);
        break;
    case 'api':
        $controller = new ApiBaseController($request, $response);
        break;
    case 'api/films':
        $controller = new ApiFilmsController($request, $response);
        break;
    case 'api/actors':
        $controller = new ApiActorsController($request, $response);
        break;
    case 'api/papers':
        $controller = new ApiPapersController($request, $response);
        break;
    case 'api/authors':
        $controller = new ApiAuthorsController($request, $response);
    default:
        if (substr($request->getPath(),0,4) == "api/"){
            $controller = new JSONErrorController($request, $response);
        }else{
            $controller = new HTMLErrorController($request, $response);
        }     
        break;
}

echo $response->getData();
