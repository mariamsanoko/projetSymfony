<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class SearchCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {   
        // define course categories 
        $courses = ['course_1', 'course_2', 'course_3'];
        $categories = ['category_1', 'category_2','categories_3'];

        $courseChoices = array_combine($courses,$courses);
        $categoryChoices = array_combine($categories,$categories)

       
        ->add('nameCourse', ChoiceType::class, [
            'choices' => [
                //'nameCourse'=>'nameCourse',
                //'mentorName'=>'mentorName',
                //'createdAt'=>'createdAt',
               //'courses'=>'courses',
              // array_combine($SearchCardType,$SearchCardType)
            ]
        ])
        ->add('category', ChoiceType::class,[
            'choices' => [

            ]
        ]);
    }
}