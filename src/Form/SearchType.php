<?php

namespace App\Form;

use App\Classe\Search;
use App\Entity\Category;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\DomCrawler\Field\InputFormField;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder 
        ->add('surfacemin', NumberType::class,[
            'label'=> 'surface min',
             'mapped'=>false,
             'attr' => [
                 'placeholder'=> 'surface min',
                 
             ]
        ])
        ->add('surfacemax', NumberType::class,[
            'label'=> 'surface max',
            'mapped'=> false,
             'attr' => [
                 'placeholder'=> 'surface max',
                 
             ]
        ])
      
        ->add('piecemin', NumberType::class,[
            'label'=> 'piece min',
            'mapped'=> false,
             'attr' => [
                 'placeholder'=> 'piece min',
                
             ]
        ])
        ->add('piecemax', NumberType::class,[
            'label'=> 'piece max',
             'attr' => [
                 'placeholder'=> 'piece max', 
             ]
        ])
        ->add('prixmin', NumberType::class,[
            'label'=> 'prix min',
            'mapped'=> false,
             'attr' => [
                 'placeholder'=> 'prix min',
                
             ]
        ])
        ->add('prixmax', NumberType::class,[
            'label'=> 'prix max',
             'attr' => [
                 'placeholder'=> 'prix max', 
             ]
        ])
        

        ->add('submit', SubmitType::class, [
            'label'=> 'Filtrer',
            'attr' => [
                'class'=> 'btn-block btn-info'
            ]
        ])
    ;
    }
    
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'method'=> 'POST',
            'crsf_protection' => false,
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
    
}