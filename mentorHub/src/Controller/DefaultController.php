<?php

namespace App\Controller;

use http\Client\Response;
use Symfony\Component\Routing\Annotation\Route;
class DefaultController
{   #[route('/')]
public function home()

{
    return new Response(message: '<h1>Welcome<h1>');
    return $this->render(view:'default/home.html.twig');
}
#[route('/category/{slug}')]
public function category($slug)
{

    return $this->render(view:'default/category.html.twig', [
        'slug'=> $slug
    ]);
}

}
}