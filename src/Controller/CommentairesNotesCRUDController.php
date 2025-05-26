<?php

namespace App\Controller;

use App\Entity\Commentaires;
use App\Entity\Escapegame;
use App\Form\CommentairesForm;
use App\Repository\NoteRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CommentairesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[IsGranted("ROLE_USER")]
final class CommentairesNotesCRUDController extends AbstractController
{
    // CREATION COMMENTAIRES
    #[Route('/commentaires/notes/create/{id}', name: 'app_commentaires_notes_create')]
    public function commentairecreate(CommentairesRepository $commentaires,NoteRepository $note , Request $request, EntityManagerInterface $entitymanager, Escapegame $escapegame): Response
    {
        $commentaires = new Commentaires();

        $formCommentaires = $this->createForm(CommentairesForm::class, $commentaires);

        $formCommentaires->handleRequest($request);

        $get = $this->getUser();
        
        $getescapegame = $request->get('id', 'bot');

        if ($formCommentaires->isSubmitted() && $formCommentaires->isValid()) {

            $commentaires->setUser($get);

            $entitymanager->persist($get);

            $commentaires->setEscapegame($getescapegame);

            $entitymanager->persist($commentaires);

            $entitymanager->flush();

            $this->addFlash('success', 'Commentaires Ajouté !');

            return $this->redirectToRoute('app_escape_game');

        }
        return $this->render('commentaires_notes_create/commentairesnotescreate.html.twig', [
            'commentairesform' => $formCommentaires->createView(),
            'escapegame' => $escapegame,
        ]);
    }

    // MODIFICATION COMMENTAIRES
    #[Route('/commentaires/notes/update/{id}', name: 'app_commentaires_notes_update')]
    public function commentaireupdate(Commentaires $commentaires, Request $request, EntityManagerInterface $entitymanager, Escapegame $escapegame): Response
    {
        $form = $this->createForm(CommentairesForm::class, $commentaires);

        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {

            $entitymanager->persist($commentaires);

            $entitymanager->flush();

            $this->addflash('success', 'votre escape game a bien été modifié');

            return $this->redirectToRoute('app_escape_game');
        }

        return $this->render('commentaires_notes_update/commentairesnotesupdate.html.twig', [
            'commentairesform' => $form->createView()
        ]);
    }

    // SUPPRESSION COMMENTAIRES
    #[Route('/commentaires/notes/delete/{id}', name: 'app_commentaires_notes_delete')]
    public function commentairedelete(Commentaires $commentaires, Request $request, EntityManagerInterface $entitymanager): Response
    {
        if($this->isCsrfTokenValid("SUP". $commentaires->getId(),$request->get('_token'))){

            $entitymanager->remove($commentaires);

            $entitymanager->flush();

            $this->addFlash("success","La suppression a été effectuée");

            return $this->redirectToRoute("app_escape_game");
        }
        
        $this->addFlash("error", "Token CSRF invalide");
        return $this->redirectToRoute("app_escape_game");
    }
}