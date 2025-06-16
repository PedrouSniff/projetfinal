<?php

namespace App\Form;

use App\Entity\user;
use App\Entity\Escapegame;
use App\Entity\Commentaires;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class CommentairesForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('texte', TextareaType::class, [
                'label' => ' ',
                "constraints" => [
                    new \Symfony\Component\Validator\Constraints\Length([
                        'min' => 10,
                        'max' => 100,
                        'minMessage' => 'Le commentaire doit contenir au moins 10 caractères.',
                        'maxMessage' => 'Le commentaire doit contenir au maximum 100 caractères.',
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Commentaires::class,
        ]);
    }
}
