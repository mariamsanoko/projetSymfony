<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{   #[Route('inscription.html')]
    public function register()
    {
        return $this->render('user/register.html.twig');
    }
}