<?php

namespace App\Controller;

use App\Repository\CommentairesRepository;
use App\Repository\EscapegameRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function accueil(EscapegameRepository $escapegame, CommentairesRepository $commentaires): Response
    {
        $allEscapegame = $escapegame->findBy([], ['id' => 'DESC'], 2);
        $allCommentaires = $commentaires->findBy([], ['id' => 'DESC'], 3);

        return $this->render('accueil/accueil.html.twig', [
            'escapegames' => $allEscapegame,
            'commentaires' => $allCommentaires,
        ]);
    }
}
