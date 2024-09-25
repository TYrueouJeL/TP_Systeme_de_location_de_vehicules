<?php

namespace App\Controller;

use App\Repository\VehicleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
}
