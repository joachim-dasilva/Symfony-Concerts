<?php

namespace App\Controller;

use App\Entity\Band;
use App\Repository\BandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BandController extends AbstractController
{

    /**
     * @Route("/bands", name="bands_list")
     */
    public function bands_list(BandRepository $bandRepository): Response
    {
        return $this->render('band/list.html.twig', [
            'controller_name' => 'BandController',
            'bands' => $bandRepository->findAll()
        ]);
    }

    /**
     * @Route("/", name="band_show")
     */
    public function band_show(BandRepository $bandRepository): Response
    {
        return $this->render('band/show.html.twig', [
            'controller_name' => 'BandController',
            'band' => $bandRepository->find(4)
        ]);
    }
}
