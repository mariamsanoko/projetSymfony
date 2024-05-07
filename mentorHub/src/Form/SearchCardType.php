<?php

namespace App\Form;
use App\Entity\Category;
use App\Entity\Course;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->setMethod('GET')
            ->add('course', EntityType::class, [
                'class' => Course::class,
                'required' => false,
                'choice_label' => 'title',
                'label' => 'Vous êtes plutôt ?*',
                'placeholder' => '-- Choisissez un sujet de mentoring --',
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'required' => false,
                'choice_label' => 'name',
                'label' => 'ou Filtrer par catégorie',
                'placeholder' => '-- Choisissez une catégorie --',
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'Rechercher',
            ]);
    }
}