<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MasterClassController extends AbstractController
{
    #[Route('/master/class', name: 'app_master_class')]
    public function index(): Response
    {
        return $this->render('master_class/index.html.twig', [
            'controller_name' => 'MasterClassController',
        ]);
    }
}
