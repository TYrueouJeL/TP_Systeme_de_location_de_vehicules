<?php

namespace App\DataFixtures;

use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class VehicleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $vehicle = new Vehicle();
        $vehicle->setCapacity(5);
        $vehicle->setPrice(10000);
        $vehicle->setNumberKilometers(80000);
        $vehicle->setNumberPlate('AB123CD');
        $vehicle->setYearOfVehicle(2015);
        $vehicle->setPicturePath('/src/img/vehicle1.jpg');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setCapacity(5);
        $vehicle->setPrice(15000);
        $vehicle->setNumberKilometers(50000);
        $vehicle->setNumberPlate('EF456GH');
        $vehicle->setYearOfVehicle(2019);
        $vehicle->setPicturePath('/src/img/vehicle2.jpg');
        $manager->persist($vehicle);

        $vehicle = new Vehicle();
        $vehicle->setCapacity(2);
        $vehicle->setPrice(100000);
        $vehicle->setNumberKilometers(20000);
        $vehicle->setNumberPlate('IJ789KL');
        $vehicle->setYearOfVehicle(2020);
        $vehicle->setPicturePath('/src/img/vehicle3.jpg');
        $manager->persist($vehicle);

        $manager->flush();
    }
}
