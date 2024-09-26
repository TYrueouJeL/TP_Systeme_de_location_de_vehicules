<?php

namespace App\DataFixtures;

use App\Entity\Brand;
use App\Entity\Customer;
use App\Entity\Model;
use App\Entity\Option;
use App\Entity\Reservation;
use App\Entity\State;
use App\Entity\Type;
use App\Entity\User;
use App\Entity\Vehicle;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $brand = new Brand();
        $brand->setName('BMW');
        $brandTab[] = $brand;

        $brand = new Brand();
        $brand->setName('Mercedes');
        $brandTab[] = $brand;

        $brand = new Brand();
        $brand->setName('Ford');
        $brandTab[] = $brand;

        $model = new Model();
        $model->setName('Série 1');
        $model->setBrand($brandTab[0]);
        $modelTab[] = $model;

        $model = new Model();
        $model->setName('Classe A');
        $model->setBrand($brandTab[1]);
        $modelTab[] = $model;

        $model = new Model();
        $model->setName('Focus');
        $model->setBrand($brandTab[2]);
        $modelTab[] = $model;

        $customer = new Customer();
        $customer->setFirstname('John');
        $customer->setLastname('Doe');
        $customer->setAddress('1 rue de la Paix');
        $customer->setPostCode('75000');
        $customer->setCity('Paris');
        $customer->setEmail('johndoe@gmail.com');
        $customer->setPhone('0102030405');
        $customer->setDrivingLicense('123456789');
        $customerTab[] = $customer;

        $customer = new Customer();
        $customer->setFirstname('Jane');
        $customer->setLastname('Doe');
        $customer->setAddress('2 rue de la Paix');
        $customer->setPostCode('75000');
        $customer->setCity('Paris');
        $customer->setEmail('janedoe@gmail.com');
        $customer->setPhone('0102030406');
        $customer->setDrivingLicense('123456788');
        $customerTab[] = $customer;

        $customer = new Customer();
        $customer->setFirstname('Jack');
        $customer->setLastname('Doe');
        $customer->setAddress('3 rue de la Paix');
        $customer->setPostCode('75000');
        $customer->setCity('Paris');
        $customer->setEmail('jackdoe@gmail.com');
        $customer->setPhone('0102030407');
        $customer->setDrivingLicense('123456787');
        $customerTab[] = $customer;

        $state = new State();
        $state->setStatus('En attente');
        $stateTab[] = $state;

        $state = new State();
        $state->setStatus('En cours');
        $stateTab[] = $state;

        $state = new State();
        $state->setStatus('Terminée');
        $stateTab[] = $state;

        $type = new Type();
        $type->setName('Berline');
        $typeTab[] = $type;

        $type = new Type();
        $type->setName('SUV');
        $typeTab[] = $type;

        $type = new Type();
        $type->setName('Utilitaire');
        $typeTab[] = $type;

        $options = new Option();
        $options->setName('Climatisation');
        $optionsTab[] = $options;

        $options = new Option();
        $options->setName('GPS');
        $optionsTab[] = $options;

        $options = new Option();
        $options->setName('Siège bébé');
        $optionsTab[] = $options;

        $vehicle = new Vehicle();
        $vehicle->setCapacity(5);
        $vehicle->setPrice(100);
        $vehicle->setNumberKilometers(1000);
        $vehicle->setNumberPlate('AA-123-AA');
        $vehicle->setYearOfVehicle('2020');
        $vehicle->setPicturePath('/img/vehicle1.jpg');
        $vehicle->setModel($modelTab[0]);
        $vehicle->setType($typeTab[0]);
        $vehicleTab[] = $vehicle;

        $vehicle = new Vehicle();
        $vehicle->setCapacity(5);
        $vehicle->setPrice(100);
        $vehicle->setNumberKilometers(1000);
        $vehicle->setNumberPlate('BB-123-BB');
        $vehicle->setYearOfVehicle('2020');
        $vehicle->setPicturePath('/img/vehicle2.jpg');
        $vehicle->setModel($modelTab[1]);
        $vehicle->setType($typeTab[1]);
        $vehicleTab[] = $vehicle;

        $vehicle = new Vehicle();
        $vehicle->setCapacity(5);
        $vehicle->setPrice(100);
        $vehicle->setNumberKilometers(1000);
        $vehicle->setNumberPlate('CC-123-CC');
        $vehicle->setYearOfVehicle('2020');
        $vehicle->setPicturePath('/img/vehicle3.jpg');
        $vehicle->setModel($modelTab[2]);
        $vehicle->setType($typeTab[2]);
        $vehicleTab[] = $vehicle;

        $reservation = new Reservation();
        $reservation->setReference('RESA1');
        $reservation->setDateStart(new \DateTime('2021-01-01'));
        $reservation->setDateEnd(new \DateTime('2021-01-02'));
        $reservation->setNumberRentalDay(1);
        $reservation->setTotalCost(100);
        $reservation->setCustomer($customerTab[0]);
        $reservation->setVehicle($vehicleTab[0]);
        $reservation->setState($stateTab[0]);
        $reservationTab[] = $reservation;

        $reservation = new Reservation();
        $reservation->setReference('RESA2');
        $reservation->setDateStart(new \DateTime('2021-01-03'));
        $reservation->setDateEnd(new \DateTime('2021-01-04'));
        $reservation->setNumberRentalDay(1);
        $reservation->setTotalCost(100);
        $reservation->setCustomer($customerTab[1]);
        $reservation->setVehicle($vehicleTab[1]);
        $reservation->setState($stateTab[1]);
        $reservationTab[] = $reservation;

        $reservation = new Reservation();
        $reservation->setReference('RESA3');
        $reservation->setDateStart(new \DateTime('2021-01-05'));
        $reservation->setDateEnd(new \DateTime('2021-01-06'));
        $reservation->setNumberRentalDay(1);
        $reservation->setTotalCost(100);
        $reservation->setCustomer($customerTab[2]);
        $reservation->setVehicle($vehicleTab[2]);
        $reservation->setState($stateTab[2]);
        $reservationTab[] = $reservation;

        $user = new User();
        $user->setEmail('admin@admin.com');
        $user->setPassword('admin');
        $user->setRoles(['ROLE_ADMIN']);
        $user->setUsername('Admin');
        $userTab[] = $user;

        $user = new User();
        $user->setEmail('client@client.com');
        $user->setPassword('client');
        $user->setRoles(['ROLE_CLIENT']);
        $user->setUsername('Client');
        $userTab[] = $user;

        foreach ($brandTab as $brand) {
            $manager->persist($brand);
        }

        foreach ($modelTab as $model) {
            $manager->persist($model);
        }

        foreach ($customerTab as $customer) {
            $manager->persist($customer);
        }

        foreach ($stateTab as $state) {
            $manager->persist($state);
        }

        foreach ($typeTab as $type) {
            $manager->persist($type);
        }

        foreach ($optionsTab as $options) {
            $manager->persist($options);
        }

        foreach ($vehicleTab as $vehicle) {
            $manager->persist($vehicle);
        }

        foreach ($reservationTab as $reservation) {
            $manager->persist($reservation);
        }

        foreach ($userTab as $user) {
            $manager->persist($user);
        }

        $manager->flush();
    }
}
