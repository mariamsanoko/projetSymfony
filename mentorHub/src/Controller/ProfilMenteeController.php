<?php

namespace App\Controller;

use App\Entity\Mentee;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilMenteeController extends AbstractController
{
    #[Route('/profil/mentee/{id}', name: 'app_profil_mentee')]
    public function index(Mentee $mentee): Response
    {
        return $this->render('profil/mentee/profil_mentee.html.twig', [
            'mentee' => $mentee,
        ]);
    }


    #[Route('/profil/mes-sessions', name: 'app_profil_mentee_sessions')]
    public function sessions(): Response
    {
        /** @var User $user */
        $user = $this->getUser();

        # Session suivie par l'utilisateur : dd($user->getMentorSessions()->toArray());
        return $this->render('profil/mentee/profil_mentee_sessions.html.twig');
    }
}
