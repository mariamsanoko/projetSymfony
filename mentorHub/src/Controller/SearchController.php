<?php

namespace App\Controller;
use App\Form\SearchCardType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController
{
    #[Route('/search/mentor/', name: 'search_mentor')]
    public function searchMentor(Request $request)

    {
        $searchMentorForm = $this->createForm(SearchCardType::class);
        return $this->render('search/mentor.html.twig', [
            'search_form' => $searchMentorForm->createView(),
        ]);
    }
}