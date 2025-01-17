<?php

namespace App\Entity;

use App\Repository\JeuDuelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuDuelRepository::class)]
class JeuDuel extends Jeu

{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $dureeMax = null;

    #[ORM\Column(length: 255)]
    private ?string $type_adversaire = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDureeMax(): ?int
    {
        return $this->dureeMax;
    }

    public function setDureeMax(int $dureeMax): static
    {
        $this->dureeMax = $dureeMax;

        return $this;
    }

    public function getTypeAdversaire(): ?string
    {
        return $this->type_adversaire;
    }

    public function setTypeAdversaire(string $type_adversaire): static
    {
        $this->type_adversaire = $type_adversaire;

        return $this;
    }
}
