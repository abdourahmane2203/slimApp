<?php
namespace App\Controllers;


use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response)
    {
        $user = $this->db->table('user')->find(1);
        echo $user->email;
        return $this->view->render($response, 'home.twig');
    }
}