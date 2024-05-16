<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CoursesDetailController extends AbstractController
{
    #[Route('/courses/detail/', name: 'app_courses_detail')]
    public function index(): Response
    {
        return $this->render('courses/detail/courses_detail.html.twig', [
            'CoursesDetailController' => 'CoursesDetailController',
        ]);
    }
}
