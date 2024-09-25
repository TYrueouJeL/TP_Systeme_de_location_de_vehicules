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
            ->add('lastname')
            ->add('firstname')
            ->add('address')
            ->add('postCode')
            ->add('city')
            ->add('email')
            ->add('phone')
            ->add('drivingLicense')
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
