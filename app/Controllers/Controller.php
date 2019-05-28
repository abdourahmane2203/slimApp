<?php


namespace App\Controllers;


use Slim\Views\Twig;

class Controller
{
    protected $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    /**
     * @param Twig
     * @return Twig
     * METHODE MAGIQUE ==> POUR ECRIRE SIMPLEMENT $this->view->render() AULIEU DE
     * $this->container->view->render() DANS LES CONTROLLERS
     * DES QU'ON ESSAIE D'ACCEDER A $this->view->render()
     * ==> LA METHODE __get() SERA AUTOMATIQUE LANCER
     * ET $this->view->render() SEAR REMPLACE PAR $this->container->view->render()
    */
    public function __get($property)
    {
        // ON VERIFIE SI LA PROPRIETE EXISTE
        if ($this->container->{$property})
            return $this->container->{$property};
    }

}