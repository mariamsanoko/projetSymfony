<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('inscription')]
    public function register():
    {
        return $this->render(view: 'user/register.html.twig');
    }
}