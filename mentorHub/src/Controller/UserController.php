<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('inscription')]
    public function register()
    {
        $user = new User();

        $form = $this -> CreateForm(UserType::class, $user);
        return $this->render('user/register.html.twig');
    }
}