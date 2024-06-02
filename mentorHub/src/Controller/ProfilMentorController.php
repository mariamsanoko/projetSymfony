<?php

namespace App\Controller;

use App\Entity\Mentor;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilMentorController extends AbstractController
{
    #[Route('/profil/mentor/{id}', name: 'app_profil_mentor')]
    public function index(Mentor $mentor): Response
    {
        return $this->render('profil/mentor/profil_mentor.html.twig', [
            'mentor' => $mentor,
        ]);
    }


    #[Route('/profil/mes-sessions', name: 'app_profil_mentor_sessions')]
    public function sessions(): Response
    {
        /** @var User $user */
        $user = $this->getUser();


        # Session suivie par l'utilisateur : dd($user->getMentorSessions()->toArray());
        
        //dd($user->getMentorSessions()->toArray());
        dd($user->getMentor());
        
        return $this->render('profil/mentor/profil_mentor_sessions.html.twig', [
            'TraningSession' => $user->getMentor()->getSessions(),
        ]);

    }
}
