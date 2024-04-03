<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/inscription.html')]
    public function register(Request $request): Response
    {
        #create user empty
        $user= new User();
        #createForm
        $form = $this->createForm(UserType::class);

        return $this->render('user/register.html.twig',[
           'form'=> $form->createView(),
        ]);


    }
}
