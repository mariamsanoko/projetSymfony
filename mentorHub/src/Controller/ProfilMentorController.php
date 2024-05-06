<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilMentorController extends AbstractController
{
    #[Route('/profil/mentor', name: 'app_profil_mentor')]
    public function index(): Response
    {
        return $this->render('profil/mentor/profil_mentor.html.twig', [
            'controller_name' => 'ProfilMentorController',
        ]);
    }
}
