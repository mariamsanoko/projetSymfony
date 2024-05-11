<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MatchingController extends AbstractController
{
    #[Route('/matching', name: 'app_matching')]
    public function matchUsers(): Response
    {
        //logique de matching pour trouver les utlisateurs compatibles
        
        return $this->render('matching/matching.html.twig', [
            'controller_name' => 'MatchingController',
        ]);
    }
}
