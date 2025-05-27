<?php

namespace App\Controller;

use App\Form\ContactForm;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $formCommentaires = $this->createForm(ContactForm::class);

        return $this->render('contact/contact.html.twig', [
            'formcontact' => $formCommentaires,
        ]);
    }
}
