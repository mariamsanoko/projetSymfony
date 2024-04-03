<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/inscription.html')]
    public function register(Request $request)
    {
        #dd($request);
        #create user empty
        $user= new User();
        dump($user);

        #createForm
        $form = $this->createForm(UserType::class, $user);
       # traitment request
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            dd($user);
        }
        #Pass form to view
        return $this->render('user/register.html.twig',[
           'form'=> $form->createView(),
        ]);


    }
}
