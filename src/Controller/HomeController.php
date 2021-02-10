<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

// - AbstractController permet de ne pas utiliser de Response
// - Route() est utiliser à la place de Route.yaml

Class HomeController extends AbstractController{

    /**
     * @Route ("/", name="home")
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('pages/home.html.twig');
    }

}