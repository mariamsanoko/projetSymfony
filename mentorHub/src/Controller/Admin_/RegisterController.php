<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class RegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function register()
    {
        return  $this->render("admin/register.html.twig");
    }
}