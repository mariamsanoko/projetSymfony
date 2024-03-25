<?php

namespace App\Controller\Controller;

use App\Repository\MentorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
/**
 * récupérer les fiche des 3 mentors de ma base
 * find: trouver par l'id  ($id, $lockMode = null, $lockVersion = null)
 * findOneBy      (array $criteria, array $orderBy = null)
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

    #[Route('/category/{slug}')]
    /* # Ex. http://127.0.0.1:8000/category/politique
     * # Ex. http://127.0.0.1:8000/category/economie
     * # {slug} représente un paramètre de la route.*/


    public function category($slug)
    {
        return $this->render('default/category.html.twig', [
            'slug' => $slug,
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
