<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController
{
    #[Route('/mentor/search', name: 'search_mentor')]
    public function searchMentor(Request $request)
    {
        return $this->render('search/mentor.html.twig');
    }
}