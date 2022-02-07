<?php

namespace App\Controller;

use App\Repository\RoomRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RoomController extends AbstractController
{
    /**
     * @Route("/rooms", name="rooms_list")
     */
    public function rooms_list(RoomRepository $roomRepository): Response
    {
        return $this->render('room/list.html.twig', [
            'controller_name' => 'RoomController',
            'page_title' => 'Salles',
            'rooms' => $roomRepository->findAll()
        ]);
    }
}
