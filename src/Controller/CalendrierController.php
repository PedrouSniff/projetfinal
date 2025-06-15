<?php

namespace App\Controller;

use App\Repository\ReservationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CalendrierController extends AbstractController
{
    #[Route('/calendrier', name: 'app_calendrier')]
    public function calendrier(ReservationRepository $reservation): Response
    {
        $reservations = $reservation->findAll();

        $res = [];

        foreach ($reservations as $event) {
            $res[] = [
                'id' => $event->getId(),
                'start' => $event->getStart()->format('Y-m-d H:i:s'),
                'title' => 'Réservé',
            ];
        }

        $data = json_encode($res);

        return $this->render('calendrier/calendrier.html.twig', [
            'data' => $data,
        ]);
    }
}
