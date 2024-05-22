<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Course;
use App\Form\SearchCardType;
use App\Repository\MentorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController
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

        // Récupérer les sessions de mentorat de l'utilisateur
        $sessions = $user->getMentor()->getSessions();

        return $this->render('profil/mentor/profil_mentor_sessions.html.twig', [
            'trainingSessions' => $sessions,
        ]);
    }
}
