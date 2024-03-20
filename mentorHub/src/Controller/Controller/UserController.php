<?php

namespace App\Controller\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{   #[Route('inscription.html')]
    public function register(Request $request, EntityManagerInterface $manager)
    {
        #dd($request);
        # verify data the send to form

        #create user vide
        $user = new User();
        # dump($user); object null

        #create form
        $form = $this->createForm(UserType::class, $user);

        #Pass the request of Tratement user Form
        $form->handleRequest($request);

        # is submitted by user
        if ($form->isSubmitted()) {
                #dd($user);

            # save in bbd
            $manager->persist($user);
            $manager->flush();
            # Encode de password
            # Redirection
            return $this->redirectToRoute('app_default_home');
            }

        #Pass form to the view

        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}