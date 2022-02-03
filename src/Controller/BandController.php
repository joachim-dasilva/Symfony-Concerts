<?php

namespace App\Controller;

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
            'page_title' => 'Groupes',
            'bands' => $bandRepository->findAll()
        ]);
    }

    /**
     * @Route("/band/{id}", name="band_show")
     */
    public function band_show(BandRepository $bandRepository, int $id): Response
    {
        return $this->render('band/show.html.twig', [
            'controller_name' => 'BandController',
            'page_title' => 'Groupe',
            'band' => $bandRepository->find($id ?? 1)
        ]);
    }
}
