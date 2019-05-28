<?php
// DEMARRAGE DE LA SESSION
session_start();
// TOUS LES CHEMIN SONT RELATIFS AU FICHIER index.php ==> DANS LE DOSSIER PUBLIC
// TOUT LE TRAFIC EST REDIRIGE VERS index.php ==> DANS LE DOSSIER PUBLIC
require '../vendor/autoload.php';

$app = new Slim\App([
    'settings' => ['displayErrorDetails' => true],
]);
require_once "container.php";

require '../app/routes.php';
