<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function inscription(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = new User();
    
        $form = $this->createForm(UserForm::class, $user);
    
        $form->handleRequest($request);

        // Vérification si l'email existe déjà (Si jamais j'en ai besoin)

        // if($entityManager->getRepository(User::class)->findOneBy(['email' => $user->getEmail()])){
        //     $this->addFlash('error', 'Cet email est déjà utilisé. Veuillez en choisir un autre.');
        //     return $this->redirectToRoute('app_inscription');
        // }
    
        if ($form->isSubmitted() && $form->isValid()){

            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $passwordEncoder->hashPassword($user,$form->get('password')->getData())
            );

            $entityManager->persist($user);

            $entityManager->flush();
    
            $this->addFlash('success', 'Bienvenue !');
    
            return $this->redirectToRoute('app_login');
        }

        return $this->render('inscription/inscription.html.twig', [
            'userform' => $form->createView()
        ]);
    }
}
