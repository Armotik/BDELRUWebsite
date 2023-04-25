<?php

namespace App\Controller;

use App\Repository\EvenementsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_default')]
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    #[Route('/adhesion', name: 'app_default_adhesion')]
    public function adhesion(): Response
    {
        return $this->render('default/adhesion.html.twig');
    }

    #[Route('/qsm', name: 'app_default_qsn')]
    public function qsn(): Response
    {
        return $this->render('default/qsn.html.twig');
    }

    #[Route('/events', name: 'app_default_events')]
    public function events(EvenementsRepository $evenementsRepository): Response
    {

        $currentDate = new \DateTime();
        $events = $evenementsRepository->findAll();

        $soirees = [];
        $actualites = [];
        $journees = [];
        $autres = [];

        foreach ($events as $event) {
            if (str_starts_with($event->getDesignation(), "BDE_SR")) {
                $soirees[] = $event;
            }

            if (str_starts_with($event->getDesignation(), "BDE_AC")) {
                $actualites[] = $event;
            }

            if (str_starts_with($event->getDesignation(), "BDE_JR")) {
                $journees[] = $event;
            }

            if (str_starts_with($event->getDesignation(), "BDE_AU")) {
                $autres[] = $event;
            }
        }

        return $this->render('default/events.html.twig', [
            'events' => $evenementsRepository->findAll(),
            'soirees' => $soirees,
            'actualites' => $actualites,
            'journees' => $journees,
            'autres' => $autres,
            'currentDate' => $currentDate
        ]);
    }
}
