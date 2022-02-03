<?php

namespace App\Controller;

use App\Entity\Concert;
use App\Form\ConcertType;
use App\Repository\ConcertRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ConcertController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function home(ConcertRepository $concertRepository): Response
    {
        return $this->render('home.html.twig', [
            'controller_name' => 'ConcertController',
            'page_title' => 'Accueil',
            'concerts' => $concertRepository->findAll()
        ]);
    }

    /**
     * @Route("/archives", name="archives")
     */
    public function archives(ConcertRepository $concertRepository): Response
    {
        return $this->render('concert/archives.html.twig', [
            'controller_name' => 'ConcertController',
            'page_title' => 'Archives',
            'concerts' => $concertRepository->findAllPast()
        ]);
    }

    /**
     * @Route("/concert/create/{id}", name="concert_create")
     */
    public function createConcert(Request $request, ManagerRegistry $managerRegistry): Response
    {
        $concert = new Concert();
        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $concert = $form->getData();
            $entityManager = $managerRegistry->getManagerForClass(get_class($concert));
            $entityManager->persist($concert);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('concert/new.html.twig', [
            'controller_name' => 'ConcertController',
            'page_title' => 'Nouveau concert',
            'container_title' => 'Créer un nouveau concert',
            'form' => $form->createView()
            ]);
    }

    /**
     * @param Concert $concert
     * 
     * @Route("/concert/delete/{id}", name="concert_delete")
     */
    public function deleteConcert(ManagerRegistry $managerRegistry, Concert $concert): Response
    {
        $entityManager = $managerRegistry->getManagerForClass(get_class($concert));
        $entityManager->remove($concert);
        $entityManager->flush();
        return $this->redirectToRoute('home');
    }

    /**
     * @param Concert $concert
     * 
     * @Route("/concert/edit/{id}", name="concert_edit")
     */
    public function editConcert(Request $request, ManagerRegistry $managerRegistry, Concert $concert): Response
    {
        $form = $this->createForm(ConcertType::class, $concert);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $concert = $form->getData();
            $entityManager = $managerRegistry->getManagerForClass(get_class($concert));
            $entityManager->persist($concert);
            $entityManager->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('concert/new.html.twig', [
            'controller_name' => 'ConcertController',
            'page_title' => 'Modifier concert',
            'container_title' => 'Modifier le concert',
            'form' => $form->createView()
            ]);
    }
}
