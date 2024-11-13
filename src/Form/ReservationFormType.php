<?php

namespace App\Form;

use App\Entity\Customer;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('lastname', null, [
                'label' => 'Nom',
                'attr' => [
                    'placeholder' => 'Nom',
                ]
            ])
            ->add('firstname', null, [
                'label' => 'Prénom',
                'attr' => [
                    'placeholder' => 'Prénom',
                ]
            ])
            ->add('address', null, [
                'label' => 'Adresse',
                'attr' => [
                    'placeholder' => 'Adresse',
                ]
            ])
            ->add('postCode', null, [
                'label' => 'Code postal',
                'attr' => [
                    'placeholder' => 'Code postal',
                ]
            ])
            ->add('city', null, [
                'label' => 'Ville',
                'attr' => [
                    'placeholder' => 'Ville',
                ]
            ])
            ->add('email', null, [
                'label' => 'Mail',
                'attr' => [
                    'placeholder' => 'Mail',
                ]
            ])
            ->add('phone', null, [
                'label' => 'Numéro de téléphone',
                'attr' => [
                    'placeholder' => 'Numéro de téléphone',
                ]
            ])
            ->add('drivingLicense', null, [
                'label' => 'Permis de conduire',
                'attr' => [
                    'placeholder' => 'Permis de conduire',
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label' =>'Réserver',
                'attr' =>[
                    'class' => 'btn btn-primary',
                    'placeholder' => 'Réserver',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Customer::class,
        ]);
    }
}
