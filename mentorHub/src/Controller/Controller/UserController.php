<?php

namespace App\Controller\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{   #[Route('inscription.html')]
    public function register(Request $request,
                             UserPasswordHasherInterface $hasher,
                             EntityManagerInterface $manager)
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
        if ($form->isSubmitted() && $form->isValid()) {
                #dd($user);

            // Encode de password
            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());

            // Update user mdp hashed
            $user->setPassword($hashedPassword);

            # Persist user in BDD
            $manager->persist($user);
            $manager->flush();

            # Redirection
            return $this->redirectToRoute('app_default_home');
            }

        #Pass form to the view
        // Read form inscription

        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}