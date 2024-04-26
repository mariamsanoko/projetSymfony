<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class LoginController extends AbstractController
{
    #[Route('/login', name: 'login')]
    public function login()
    {
        return  $this->render("admin/login.html.twig");
    }
}