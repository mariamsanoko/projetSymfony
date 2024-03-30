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
     * findOneBy : Récuperer un element via des critère Un mentor via son slug   (array $criteria, array $orderBy = null)
     * findAll():
     * findBy() :
     */
    #[Route('/')]
    // Ex. http://127.0.0.1:8000/
    public function home(MentorRepository $mentorRepository): Response
    {
        return $this->render('default/home.html.twig', [
            'mentor' => $mentorRepository->findAll()
        ]);
    }

    #[Route('/categorie/{id}')]
    /* # Ex. http://127.0.0.1:8000/categorie/3
     * # {slug} représente un paramètre de la route.*/
    public function category($id, CategoryRepository $categoryRepository)
    {
        $category = $categoryRepository->find($id);
        # dd($category);
        return $this->render('default/category.html.twig', [
            'category' => $category,
        ]);
    }

    #[Route('/page/contact.html')]
    // Ex. http://127.0.0.1:8000/page/contact.html
    public function contact()
    {
        return new Response('
            <h1>Contactez-nous</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem itaque repudiandae. At consequuntur debitis expedita fuga fugit harum mollitia numquam odio quia quis? Dignissimos ducimus eius id nemo quibusdam.</p>
        ');
    }

    #[Route('/search/{specialite}')]
    // {slug} représente un paramètre de la route.
    public function searchSpecialite($specialite)
    {
        # TODO Rechercher dans ma BDD tous les medecins qui font cette spécialité.
        # TODO Retourner le résultat dans ma vue, pour affichage...

        return new Response("
            <h1>Vous recherchez un spécialiste : $specialite</h1>
        ");
    }

}
