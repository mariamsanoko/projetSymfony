<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;



class UserController extends AbstractController
{
    #[Route('register.html')]
    public function register(Request $request, UserPasswordHasherInterface $hasher, EntityManagerInterface $manager)
    {
        $builder
            ->add('firstname', TextType::class, [
                'label' => 'Nom'
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom'
            ])
            ->add('email', EmailType::class, [
        'label' => 'E-mail'
            ])
            ->add('password', PasswordType::class, [
        'label' => 'Mot de passe'
            ])
            ->add('mentorsessions', IntegerType::class, [
                'label' => 'Session Mentoring'
            ])
            ->add('submit', SubmitType::class, [
        'label' => 'Envoyer'
        ])

        // Create a user instance
        $user = new User();

        // Create the registration form
        $form = $this->createForm(UserType::class, $user);

        // Handle the form submission
        $form->handleRequest($request);

        // Check if the form is submitted and valid
        if ($form->isSubmitted() && $form->isValid()) {
            // Hash the password
            $hashedPassword = $hasher->hashPassword($user, $user->getPassword());
            $user->setPassword($hashedPassword);

            // Persist the user
            $manager->persist($user);

            try {
                // Flush changes to the database
                $manager->flush();
            } catch (\Exception $e) {
                // Handle any exceptions
                dd($e->getMessage()); // Output the error message for debugging
            }

            // Redirect after successful registration
            return $this->redirectToRoute('app_default_home');
        }

        // Render the registration form
        return $this->render('user/register.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
