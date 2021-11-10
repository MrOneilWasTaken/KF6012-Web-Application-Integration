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
        break;
    default:
        break;
}

echo $response->getData();
