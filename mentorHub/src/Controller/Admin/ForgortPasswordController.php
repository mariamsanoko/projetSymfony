<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/admin')]
class ForgortPasswordController extends AbstractController
{
    #[Route('/forgot', name: 'forgot')]
    public function forgot()
    {
        return  $this->render("admin/forgot.html.twig");
    }
}