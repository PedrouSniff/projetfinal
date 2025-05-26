<?php

namespace App\Controller;

use App\Repository\EscapegameRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class EscapeGameController extends AbstractController
{
    // ESCAPE GAME
    #[Route('/escape_game', name: 'app_escape_game')]
    public function escapegame(EscapegameRepository $escapegame): Response
    {
        $allEscapegame = $escapegame->findAll();

        return $this->render('escape_game/escapegame.html.twig', [
            'escapegames' => $allEscapegame,
        ]);
    }
}