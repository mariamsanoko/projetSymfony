<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        // Définir des tableaux de choix pour les cours et les catégories
        $courses = ['course_1', 'course_2', 'course_3'];
        $categories = ['category_1', 'category_2', 'category_3'];

        // Utiliser array_combine pour combiner les deux tableaux en un tableau associatif
        $courseChoices = array_combine($courses, $courses);
        $categoryChoices = array_combine($categories, $categories);

        $builder
            ->add('nameCourse', ChoiceType::class, [
                'choices' => $courseChoices,
                'placeholder' => 'Choose a course',
            ])
            ->add('category', ChoiceType::class, [
                'choices' => $categoryChoices,
                'placeholder' => 'Choose a category',
            ]);
    }
}