<?php

namespace App\Form;

use App\Entity\Kontact;
use App\Entity\Products;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
         ->add('firstname', TextType::class,[
             'label' => "Prenom"
         ])
         ->add('lastname', TextType::class,[
            'label' => "Nom"
         ])
         ->add('phone', TextType::class,[
            'label' => "Votre numéro de téléphone"
         ])
         ->add('email', TextType::class,[
            'label' => "Votre email"
         ])
         ->add('product', EntityType::class, [
             'class' => Products::class,
             'label'=> "L'identifiant du bien"
         ])
         ->add('date', DateTimeType::class, [
             'label' => 'Date du rdv',
             'widget' => 'single_text'
         ])
         
         ->add('message', TextareaType::class)

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kontact::class,
        
        ]);
    }

  
}