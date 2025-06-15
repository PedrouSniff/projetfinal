<?php

namespace App\Controller;

use App\Entity\Escapegame;
use App\Entity\Reservation;
use App\Form\ReservationForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ReservationAjouterController extends AbstractController
{
    #[Route('/reservation/ajouter', name: 'app_reservation_ajouter')]
    public function dateajouter(Request $request, EntityManagerInterface $entitymanager): Response
    {
        $reservation = new Reservation();

        $form = $this->createForm(ReservationForm::class, $reservation);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation->setUser($this->getUser());
            // $reservation->setEscapegame($escapegame);

            $entitymanager->persist($reservation);
            
            $entitymanager->flush();

            $this->addFlash('success', 'Réservation ajoutée avec succès !');

            return $this->redirectToRoute('app_calendrier');
        }

        return $this->render('reservation_ajouter/reservationajouter.html.twig', [
            'reservationform' => $form->createView(),
            // 'escapegame' => $escapegame,
        ]);
    }
}
