<?php
// DEMARRAGE DE LA SESSION
session_start();
// TOUS LES CHEMIN SONT RELATIFS AU FICHIER index.php ==> DANS LE DOSSIER PUBLIC
// TOUT LE TRAFIC EST REDIRIGE VERS index.php ==> DANS LE DOSSIER PUBLIC
require '../vendor/autoload.php';

$app = new Slim\App([
    'settings' => ['displayErrorDetails' => true,
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'slim3',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ],
    ]

]);
require_once "container.php";

// ON INCLUT LE ROUTEUR
require '../app/routes.php';
