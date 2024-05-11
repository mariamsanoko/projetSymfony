<?php

namespace App\Controller; // Mettez le namespace correct correspondant au chemin de votre contrôleur

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
    // Ex. http://127.0.0.1:8000/
    public function home(MentorRepository $mentorRepository): Response
    {
        return $this->render('default/home.html.twig', [
            'mentors' => $mentorRepository->findAll()
        ]);
    }

    #[Route('/categorie/{id}')]
    /* # Ex. http://127.0.0.1:8000/categorie/3
     * # {slug} représente un paramètre de la route.*/
    public function category($id, CategoryRepository $categoryRepository)

    {   #recuprer la categorie via son ID
        $category = $categoryRepository->find($id);
        # dd($category);
        return $this->render('default/category.html.twig', [
            'category' => $category,
        ]);
    }


    #[Route('/mentor/{slug}')]
    /* # Ex. http://127.0.0.1:8000/categorie/3
     * # {slug} représente un paramètre de la route.*/
    public function mentor($slug, MentorRepository $mentorRepository)

    {   #recuprer la categorie via son ID
        $mentor = $mentorRepository->findOneBy(['slug'=> $slug]);
        # dd($mentor);
        return $this->render('default/category.html.twig', [
            'mentor' => $mentor,
        ]);
    }
    #[Route('/categories/{slug}')]

    public function categories($slug)
    {
        return $this->render('default/categories.html.twig', [
            'slug' => $slug
        ]);

    }
    
    #[Route('/default/contact.html')]

    public function contact()
    {
        return $this->render('default/contact.html.twig', [
            'contact' => $contact

        ]);
    }

}
