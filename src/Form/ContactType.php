<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('mail',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('body',TextType::class,array('attr' => array('class' => 'form-control')))
            ->add('send',SubmitType::class,array('attr' => array('class' => 'zmdi zmdi-arrow-right')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
