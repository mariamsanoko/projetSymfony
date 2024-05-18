<?php

namespace App\Controller;
use App\Entity\Category;
use App\Entity\Course;
use App\Form\SearchCardType;
use App\Repository\MentorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
class SearchController extends AbstractController
{
    #[Route('/search/mentor/', name: 'search_mentor')]
    public function searchMentor(Request $request, MentorRepository $mentorRepository)

    {
        $searchMentorForm = $this->createForm(SearchCardType::class)
            ->handleRequest($request);

        if ($searchMentorForm->isSubmitted() && $searchMentorForm->isValid()) {
            $data = $searchMentorForm->getData();
           //dd($data);

            /** @var Course $course */
            $course = $data['course'];
            
            if (null !== $course) {
                
                return $this->redirectToRoute('app_profil_mentor',
                    ['id' => $course->getMentor()->getId()]);
                
            }

            /** @var Category $category */
            $category = $data['category'];

            if (null !== $category) {
                $mentors = $category->getMentors();
            }

            
        }

        return $this->render('search/mentor.html.twig', [
            'search_mentor' => $searchMentorForm->createView(),
            'mentors' => $mentors ?? null,
        ]);
    }
}