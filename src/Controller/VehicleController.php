<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Vehicle;
use App\Form\ReservationFormType;
use App\Repository\VehicleRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VehicleController extends AbstractController
{
    #[Route('/vehicle', name: 'app_vehicle')]
    public function index(VehicleRepository $vehicleRepository): Response
    {
        return $this->render('vehicle/index.html.twig', [
            'vehicleList' => $vehicleRepository->findAll(),
        ]);
    }

    #[Route('/vehicle/{id}', name: 'app_vehicle_detail')]
    public function detail(int $id, VehicleRepository $vehicleRepository): Response
    {
        return $this->render('vehicle/detail.html.twig', [
            'vehicleId' => $id,
            'vehicle' => $vehicleRepository->find($id),
        ]);
    }

    #[Route('/vehicle/reservation/{id}', name: 'app_vehicle_reservation')]
    public function reservation(int $id, VehicleRepository $vehicleRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $customer = new Customer();

        $form = $this->createForm(ReservationFormType::class, $customer);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
//            $entityManager->persist($customer);
//            $entityManager->flush();
            return $this->redirectToRoute('/vehicle');
        }

        return $this->render('vehicle/reservation.html.twig', [
            'vehicleId' => $id,
            'vehicle' => $vehicleRepository->find($id),
            'form' => $form,
        ]);
    }
}
