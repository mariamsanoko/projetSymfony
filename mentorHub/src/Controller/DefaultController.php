<?php

namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/')]
    public function home()

    {
        return $this->render(view: 'default/home.html.twig');
    }

    #[Route('/category/{slug}')]
    public function category($slug)
    {
        return $this->render('default/category.html.twig', [
            'slug' => $slug,
        ]);
    }
}
    #[Route('/page/contact.html')]
    # Ex. http://127.0.0.1:8000/page/contact.html
    public function contact()
    {
        return new Response('
            <h1>Contactez-nous</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos dolorem itaque repudiandae. At consequuntur debitis expedita fuga fugit harum mollitia numquam odio quia quis? Dignissimos ducimus eius id nemo quibusdam.</p>
        ');
    }
