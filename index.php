<?php
// Point d'entrée du MVC

// Chargement automatique des classes
spl_autoload_register(function ($class) {
    foreach (["Controller", "Model"] as $folder) {
        $file = __DIR__ . "/$folder/{$class}.php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Récupération de l'URL
$url = isset($_GET['url']) ? explode('/', trim($_GET['url'], '/')) : [];
$controllerName = !empty($url[0]) ? ucfirst(strtolower($url[0])) . 'Controller' : 'HomeController';
$action = isset($url[1]) ? $url[1] : 'index';

if (class_exists($controllerName)) {
    $controller = new $controllerName();
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        echo "Action non trouvée.";
    }
} else {
    echo "Contrôleur non trouvé.";
}
