<?php

namespace App\Form;

use App\Entity\Model;
use App\Entity\Option;
use App\Entity\Type;
use App\Entity\Vehicle;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VehicleCreateFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('capacity', null, [
                'label' => 'Capacité',
                'attr' => [
                    'placeholder' => 'Capacité',
                ]
            ])
            ->add('price', null, [
                'label' => 'Prix',
                'attr' => [
                    'placeholder' => 'Prix',
                ]
            ])
            ->add('numberKilometers', null, [
                'label' => 'Kilométrage',
                'attr' => [
                    'placeholder' => 'Kilométrage',
                ]
            ])
            ->add('numberPlate', null, [
                'label' => "Plaque d'immatriculation",
                'attr' => [
                    'placeholder' => "AA-123-AA",
                ]
            ])
            ->add('yearOfVehicle', null, [
                'label' => 'Année',
                'attr' => [
                    'placeholder' => 'Année',
                ]
            ])
            ->add('picturePath')
            ->add('type', EntityType::class, [
                'class' => Type::class,
                'choice_label' => 'name',
            ])
            ->add('model', EntityType::class, [
                'class' => Model::class,
                'choice_label' => 'name',
            ])
            ->add('vehicleOption', EntityType::class, [
                'class' => Option::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('submit', SubmitType::class, [
                'label' =>'Créer',
                'attr' =>[
                    'class' => 'btn btn-primary',
                    'placeholder' => 'Créer',
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Vehicle::class,
        ]);
    }
}
