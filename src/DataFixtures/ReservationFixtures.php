<?php

namespace App\DataFixtures;

use App\Entity\Reservation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReservationFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $reservation = new Reservation();
        $reservation->setReference('azerty');
        $reservation->setDateStart(new \DateTime('2024-09-23'));
        $reservation->setDateEnd(new \DateTime('2024-10-23'));
        $reservation->setNumberRentalDay(30);
        $reservation->setTotalCost(1500);
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setReference('qwerty');
        $reservation->setDateStart(new \DateTime('2024-10-23'));
        $reservation->setDateEnd(new \DateTime('2024-11-23'));
        $reservation->setNumberRentalDay(30);
        $reservation->setTotalCost(1800);
        $manager->persist($reservation);

        $reservation = new Reservation();
        $reservation->setReference('qsdfgh');
        $reservation->setDateStart(new \DateTime('2024-11-23'));
        $reservation->setDateEnd(new \DateTime('2024-12-23'));
        $reservation->setNumberRentalDay(30);
        $reservation->setTotalCost(2500);
        $manager->persist($reservation);

        $manager->flush();
    }
}
