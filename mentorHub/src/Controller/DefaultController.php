<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


    #[Route('/search/{specialite}')]
    # {slug} représente un paramètre de la route.
    public function searchSpecialite($specialite)
    {
        # TODO Rechercher dans ma BDD tous les medecins qui font cette spécialité.
        # TODO Retourner le résultat dans ma vue, pour affichage...

        return new Response("
            <h1>Vous recherchez un spécialiste : $specialite</h1>
        ");
    }

}
