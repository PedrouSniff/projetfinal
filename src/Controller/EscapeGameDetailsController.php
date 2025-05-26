<?php

namespace App\Controller;

use App\Entity\Escapegame;
use App\Repository\CommentairesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class EscapeGameDetailsController extends AbstractController
{
    #[Route('/escape/game/details/{id}', name: 'app_escape_game_details')]
    public function escapegamedetails(Escapegame $escapegame,  CommentairesRepository $commentairesRepository): Response
    {
        $commentaires = $commentairesRepository->findAll();

        return $this->render('escape_game_details/escapegamedetails.html.twig', [
            'escapegame' => $escapegame,
            'commentaires' => $commentaires,
        ]);
    }
}
