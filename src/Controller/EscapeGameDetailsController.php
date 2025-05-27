<?php

namespace App\Controller;

use App\Entity\Note;
use App\Entity\Escapegame;
use App\Repository\CommentairesRepository;
use App\Repository\NoteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class EscapeGameDetailsController extends AbstractController
{
    #[Route('/escape/game/details/{id}', name: 'app_escape_game_details')]
    public function escapegamedetails(Escapegame $escapegame,  CommentairesRepository $commentairesRepository, NoteRepository $notesRepository): Response
    {
        $commentaires = $commentairesRepository->findBy([
            'escapegame' => $escapegame,
        ]);
        
        $notes = $notesRepository->findBy([
            'escapegame' => $escapegame,
        ]);

        
        return $this->render('escape_game_details/escapegamedetails.html.twig', [
            'notes'=> $notes,
            'escapegame' => $escapegame,
            'commentaires' => $commentaires,
        ]);
    }
}
