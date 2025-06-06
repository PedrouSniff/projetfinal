<?php

namespace App\Controller;

use App\Entity\Escapegame;
use App\Form\EscapegameForm;
use App\Repository\EscapegameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted("ROLE_ADMIN")]
final class EscapeGameCRUDController extends AbstractController
{
    // CREATION ESCAPE GAME
    #[Route('/escape_game/create', name: 'app_escape_game_create')]
    public function escapegamecreate(Request $request, EntityManagerInterface $entitymanager): Response
    {
        $escapegame = new Escapegame();

        $form = $this->createForm(EscapegameForm::class, $escapegame);

        $form->handleRequest($request);   

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entitymanager->persist($escapegame);

            $entitymanager->flush();

            $this->addFlash('success', 'Escape Game Ajouté !');

            return $this->redirectToRoute('app_escape_game');

        }

        return $this->render('escape_game_create/escapegamecreate.html.twig', [
            'escapegameform' => $form->createView()
        ]);
    }

    // MODIFICATION ESCAPE GAME
    #[Route('/escape/game/update/{id}', name: 'app_escape_game_update')]
    public function escapegameupdate(Escapegame $escapegame, Request $request, EntityManagerInterface $entitymanager): Response
    {
        $form = $this->createForm(EscapegameForm::class, $escapegame);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $entitymanager->persist($escapegame);

            $entitymanager->flush();

            $this->addflash('success', 'votre escape game a bien été modifié');

            return $this->redirectToRoute('app_escape_game');
        }

        return $this->render('escape_game_update/escapegameupdate.html.twig', [
            'escapegameform' => $form->createView()
        ]);
    }

    // SUPPRESSION ESCAPE GAME
    #[Route('/escape/game/delete/{id}', name: 'app_escape_game_delete')]
    public function escapegamedelete(Escapegame $escapegame, Request $request, EntityManagerInterface $entitymanager): Response
    {
        if($this->isCsrfTokenValid("SUP". $escapegame->getId(),$request->get('_token'))){

            $entitymanager->remove($escapegame);

            $entitymanager->flush();

            $this->addFlash("success","La suppression a été effectuée");

            return $this->redirectToRoute("app_escape_game");
        }
        
        $this->addFlash("error", "Token CSRF invalide");
        return $this->redirectToRoute("app_escape_game");
    }
}
