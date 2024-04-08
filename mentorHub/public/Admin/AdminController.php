<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/admin')]
/*
 * @Route("/admin")
 * class Admin Controller
 * @package App\Controller\Admin
 * */
#[Route('/admin')]
class AdminController extends AbstractController
{
    #[Route('/home')]
    public function admin()
    {
        return  $this->render("admin/home.html.twig");
    }
}