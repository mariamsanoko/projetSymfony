<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route(path: '/register.html', name: 'register')]
    public function register(): \Symfony\Component\HttpFoundation\Response
    {
        #create user 'vide', rempli par la suite avec les donnees uset

        $user = new User();

        # create form
        $form = $this->createForm(UserType::class, $user);
        return $this->render('user/register.html.twig');
    }
}