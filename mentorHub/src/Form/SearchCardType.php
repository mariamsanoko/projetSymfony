<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder
        ->add('category', ChoiceType::class,[
            'choices' => [
                'nameCourse'=>'nameCourse',
                'mentorName'=>'mentorName',
                'createdAt'=>'createdAt',
               'courses'=>'courses',
               //array_combine()
            ]
        ])
        ->add('category', ChoiceType::class,[
            'choices' => [

            ]
        ]);
    }
}