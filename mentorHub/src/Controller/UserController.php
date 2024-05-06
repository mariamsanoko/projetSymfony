<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController
{
    /**
     * @return Response
     */
    #[Route('/inscription.html')]
    public function register(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $hasher)
     #sauvegarde bbd import EntityManagerInterface (crud)
    {
        #dd($request);
        #create user empty
        $user= new User();
        ##dump($user);

        #createForm
        $form = $this->createForm(UserType::class, $user);
       # traitment request
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            ##dd($user);

            #Encodage du mot de passe
            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            #save to Mysql
            $manager->persist($user);
            $manager->flush();

            #notification
            $this->addFlash('success', "Félicitation, vous pouvez vous connecter.");
            #redirection
            return $this->redirectToRoute('app_login');

        }
        #Pass form to view
        return $this->render('user/register.html.twig',[
           'form'=> $form->createView(),
        ]);


    }
}
