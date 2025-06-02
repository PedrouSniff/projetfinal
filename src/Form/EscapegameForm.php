<?php

namespace App\Form;

use App\Entity\Escapegame;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class EscapegameForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('duree')
            ->add('difficulte', IntegerType::class, [
                'attr' => [
                    'class' => 'form-control',
                    'min' => 0,
                    'max' => 5,
                    'step' => 1,
                ],
            ])               
            ->add('imageFile', FileType::class, [
                'required'   => false,
                'mapped'     => true,
                'constraints' => [
                    new File([
                        'maxSize'   => '4M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploader une image valide (JPEG, PNG, GIF).',
                    ])
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Escapegame::class,
        ]);
    }
}
