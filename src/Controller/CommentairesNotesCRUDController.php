<?php

namespace App\Controller;

use App\Entity\Note;
use App\Entity\Escapegame;
use App\Entity\Commentaires;
use App\Form\CommentaireNoteForm;
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
    // CREATION COMMENTAIRES ET NOTES
    #[Route('/commentaires/notes/create/{id}', name: 'app_commentaires_notes_create')]
    public function commentairecreate(Request $request, EntityManagerInterface $entitymanager, Escapegame $escapegame): Response
    {
        $commentaire = new Commentaires();
        $note = new Note();

        $form = $this->createForm(CommentaireNoteForm::class, [
            'commentaire' => $commentaire,
            'note' => $note
        ]);

        $form->handleRequest($request);

        $get = $this->getUser();
        
        if ($form->isSubmitted() && $form->isValid()) {

            $commentaire->setUser($get);
            $commentaire->setEscapegame($escapegame);

            $note->setUser($get);
            $note->setEscapegame($escapegame);

            $commentaire->setNote($note);

            $entitymanager->persist($commentaire);
            $entitymanager->persist($note);

            $entitymanager->flush();

            $this->addFlash('success', 'Commentaire et Note Ajouté !');

            return $this->redirectToRoute('app_escape_game');
        }

        return $this->render('commentaires_notes_create/commentairesnotescreate.html.twig', [
            'commentaireNoteForm' => $form->createView(),
            'escapegame' => $escapegame,
        ]);
    }

    // MODIFICATION COMMENTAIRES
    #[Route('/commentaires/notes/update/{id}', name: 'app_commentaires_notes_update')]
    public function commentaireupdate(Commentaires $commentaire,Note $note, Request $request, EntityManagerInterface $entitymanager): Response
    {
        $form = $this->createForm(CommentaireNoteForm::class, [
            'commentaire' => $commentaire,
            'note' => $note
        ]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $entitymanager->persist($commentaire);
            $entitymanager->persist($note);

            $entitymanager->flush();

            $this->addflash('success', 'Votre commentaire et votre note a bien été modifié');

            return $this->redirectToRoute('app_escape_game');
        }

        return $this->render('commentaires_notes_update/commentairesnotesupdate.html.twig', [
            'commentairesNotesform' => $form->createView(),
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

