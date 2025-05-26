<?php

namespace App\Entity;

use App\Repository\NoteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NoteRepository::class)]
class Note
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?Escapegame $escapegame = null;

    #[ORM\ManyToOne(inversedBy: 'notes')]
    private ?User $user = null;

    #[ORM\Column]
    private ?int $etoile = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEscapegame(): ?Escapegame
    {
        return $this->escapegame;
    }

    public function setEscapegame(?Escapegame $escapegame): static
    {
        $this->escapegame = $escapegame;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }

    public function getEtoile(): ?int
    {
        return $this->etoile;
    }

    public function setEtoile(int $etoile): static
    {
        $this->etoile = $etoile;

        return $this;
    }
}
