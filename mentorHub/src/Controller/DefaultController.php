<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    /*
     * @Route("/", name="home)
     * */
    public function home()
    {

        return new Response("<h1>Bienvenue sur MentorHub</h1>");
        #return $this->render( 'default/home.html.twig');
    }

}
