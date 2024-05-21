<?php

namespace App\Form;

use App\Entity\Mentor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AppointementCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('bio')
            ->add('slug')
            ->add('yearExpertise')
            ->add('price')
            ->add('image')
            ->add('skills')
            ->add('position')
            ->add('experience')
            ->add('tags')
            ->add('categories')
            ->add('user')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Mentor::class,
        ]);
    }
}
