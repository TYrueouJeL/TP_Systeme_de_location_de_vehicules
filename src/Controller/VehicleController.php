<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Entity\Reservation;
use App\Entity\Vehicle;
use App\Form\ReservationFormType;
use App\Form\VehicleCreateFormType;
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

    #[Route('/vehicle/detail/{id}', name: 'app_vehicle_detail')]
    public function detail(int $id, VehicleRepository $vehicleRepository, Request $request): Response
    {
        $reservation = new Customer();
        $form = $this->createForm(ReservationFormType::class, $reservation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('app_vehicle');
        }

        return $this->render('vehicle/detail.html.twig', [
            'vehicleId' => $id,
            'vehicle' => $vehicleRepository->find($id),
            'form' => $form,
        ]);
    }

    #[Route('/vehicle/create', name: 'app_vehicle_create')]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $vehicle = new Vehicle();

        $form = $this->createForm(VehicleCreateFormType::class, $vehicle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vehicle);
            $entityManager->flush();
            return $this->redirectToRoute('app_vehicle');
        }

        return $this->render('vehicle/create.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/vehicle/update', name: 'app_vehicle_update_chooser')]
    public function updateChooser(VehicleRepository $vehicleRepository): Response
    {
        $vehicleList = $vehicleRepository->findAll();

        return $this->render('vehicle/updateChooser.html.twig', [
            'vehicleList' => $vehicleList,
        ]);
    }

    #[Route('/vehicle/update/{id}', name: 'app_vehicle_update')]
    public function update(int $id, VehicleRepository $vehicleRepository, Request $request, EntityManagerInterface $entityManager)
    {
        $vehicle = $vehicleRepository->find($id);

        $form = $this->createForm(VehicleCreateFormType::class, $vehicle);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($vehicle);
            $entityManager->flush();
            return $this->redirectToRoute('app_vehicle_update_chooser');
        }

        return $this->render('vehicle/update.html.twig', [
            'vehicle' => $vehicleRepository->find($id),
            'form' => $form,
        ]);
    }

    #[Route('/vehicle/delete', name: 'app_vehicle_delete_chooser')]
    public function deleteChooser(VehicleRepository $vehicleRepository): Response
    {
        $vehicleList = $vehicleRepository->findAll();

        return $this->render('vehicle/deleteChooser.html.twig', [
            'vehicleList' => $vehicleList,
        ]);
    }

    #[Route('/vehicle/delete/{id}', name: 'app_vehicle_delete')]
    public function delete(int $id, VehicleRepository $vehicleRepository): Response
    {
        return $this->render('vehicle/delete.html.twig', [
            'vehicle' => $vehicleRepository->find($id),
        ]);
    }

    #[Route('/vehicle/deleteVehicle/{id}', name: 'app_vehicle_deleteVehicle')]
    public function deleteVehicle(VehicleRepository $vehicleRepository, EntityManagerInterface $entityManager, int $id): Response
    {
        $vehicle = $entityManager->getRepository(Vehicle::class)->find($id);
        $entityManager->remove($vehicle);
        $entityManager->flush();

        return $this->redirectToRoute('app_vehicle_delete_chooser', [
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
