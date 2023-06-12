<?php

// Définition des routes
$routes = [
    // controller @ action @ titre
    '/' => 'HomeController@index',
    '/user/profile' => 'UserController@showProfile',
    '/user/update' => 'UserController@updateProfile',
    
    '/login' => 'AuthController@login',
    '/register' => 'AuthController@register',


];

// Récupération de l'URL actuelle
$currentUrl = $_SERVER['REQUEST_URI'];

// Recherche de la route correspondante
if (array_key_exists($currentUrl, $routes)) {
    $route = $routes[$currentUrl];
    
    // Séparation du nom du contrôleur et de l'action
    list($controllerName, $actionName) = explode('@', $route);
    
    // Inclusion du fichier du contrôleur
    require_once 'controllers/' . $controllerName . '.php';
    
    // Instanciation du contrôleur
    $controller = new $controllerName();
    
    // Appel de l'action correspondante
    $controller->$actionName();

} else {
    // Gestion de la route non trouvée (404)
    require_once('views/404.php');
}



?>