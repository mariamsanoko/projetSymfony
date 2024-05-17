<?php

namespace App\Controller;

use App\Repository\CatalogRepository;
use App\Repository\CategoryRepository;
use App\Repository\MentorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * récupérer les fiches des 3 mentors de ma base
     * find: trouver par l'id  ($id, $lockMode = null, $lockVersion = null)
     * findOneBy : Récuperer un element via des critère Un mentor via son slug (array $criteria, array $orderBy = null)
     * findAll():
     * findBy() :
     */
    #[Route('/')]
    public function home(MentorRepository $mentorRepository): Response
    {
        return $this->render('default/home.html.twig', [
            'mentors' => $mentorRepository->findAll()
        ]);
    }

    #[Route('/category/{slug}')]
    public function category($id, CategoryRepository $categoryRepository): Response
    {
        $category = $categoryRepository->find($id);
        return $this->render('default/category.html.twig', [
            'slug' => $slug,
        ]);
    }

    #[Route('/mentor/{slug}')]
    public function mentor($slug, MentorRepository $mentorRepository): Response
    {
        $mentor = $mentorRepository->findOneBy(['slug' => $slug]);
        return $this->render('default/mentor.html.twig', [
            'mentor' => $mentor,
        ]);
    }

    #[Route('/categories/{slug}')]
    public function categories($slug) : Response
    {
        return $this->render('default/categories.html.twig', [
            'slug' => $slug
        ]);
    }

    #[Route('/contact.html')]
    public function contact(): Response
    {
        return $this->render('contact/contact.html.twig');
    }
}
