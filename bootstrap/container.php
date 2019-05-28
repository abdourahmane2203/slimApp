<?php


// ON INITIALISE LE CONTAINER
$container = $app->getContainer();

// SERVICE FACTORY POUR LE ORM elequant
$container['db'] = function ($container) {
   // INITIALISATION
    $capsule = new \Illuminate\Database\Capsule\Manager;
    // AJOUT DE LA CONFIGURATION DE LA CONNEXION A LA BASE DE DONNEES.
    $capsule->addConnection($container['settings']['db']);

    $capsule->setAsGlobal();
    // DEMARRE L'ORM.
    $capsule->bootEloquent();
    return $capsule;
};

// ON CREE UNE CLE view ==> CREATION D'UN OBJET Twig
$container['view'] = function ($container){
    // CREATION DE L'OBJET Twig => $view
    // Twig(Emplacement de nos vues et un tableau d'option)==> CONSTRUCTEUR
    $view = new Slim\Views\Twig('../resources/views', ['cache' => false,]);

    // INSTANCIE ET AJOUTE DES EXTENSIONS SPECIFIQUE A SLIM
    // INSTANTIATION D'UN OBJET $router
    $router = $container->get('router');
    //$router = $container->router;
    // INSTANTIATION DE L'URI
    $uri = \Slim\Http\Uri::createFromEnvironment(new Slim\Http\Environment($_SERVER));
    // AJOUTE LES EXTENSIONS SLIM
    $view->addExtension(new Slim\Views\TwigExtension($router, $uri));
    // ON RETURN L'OBJET $view
    return $view;
};

// INSTANTIATION D'UN OBJET DE HomeController
$container['HomeController'] = function ($container)
{
    // INJECTION DE DEPENDANCE
    return new App\Controllers\HomeController($container);
};
