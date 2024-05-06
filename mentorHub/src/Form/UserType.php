<?php

namespace App\Form {
    use App\Entity\User;
    use Symfony\Component\Form\AbstractType;
    use Symfony\Component\Form\Extension\Core\Type\EmailType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\FormBuilderInterface;
    use Symfony\Component\OptionsResolver\OptionsResolver;
    use Symfony\Component\Validator\Constraints\Length;
    use Symfony\Component\Validator\Constraints\Regex;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


    class UserType extends AbstractType
    {
        public function buildForm(FormBuilderInterface $builder, array $options): void
        {
            $builder
                ->add('fullName', TextType::class, [
                    'label' => 'Prénom Nom'
                ])
                ->add('email', EmailType::class,[
                    'label' => 'E-mail'
                ])
                ->add('password', PasswordType::class,[
                    'label' => 'Mot de passe',
                    'constraints' => [
                        new Length([
                            'min' => 12,
                            'minMessage' => 'Votre mot de passe doit contenir au moins {{ limit }} caractères',
                        ]),
                        new Regex([
                            'pattern' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).{8,}$/',
                            'message' => 'Votre mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule et un chiffre',
                        ]),
                    ],
                    ])
                    ->add('roles', ChoiceType::class, [
                        'expanded' => true,
                        'multiple' => true,
                            'choices'  => [        'Mentor' => 'ROLE_MENTOR',
                                'Mentoré' => 'ROLE_MENTEE',
                            ],
                    ])
                ->add('submit', SubmitType::class,[
                    'label' => 'Envoyer'
                ])
            ;
        }

        public function configureOptions(OptionsResolver $resolver): void
        {
            $resolver->setDefaults([
                'data_class' => User::class,
            ]);
        }
    }
}
