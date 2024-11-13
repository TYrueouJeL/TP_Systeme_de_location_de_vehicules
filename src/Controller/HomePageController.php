<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Entity\Vehicle;
use App\Form\HomePageFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(Request $request): Response
    {
        return $this->render('home_page/index.html.twig', [
        ]);
    }
}
