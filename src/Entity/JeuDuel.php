<?php

namespace App\Entity;

use App\Repository\JeuDuelRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuDuelRepository::class)]
class JeuDuel extends Jeu

{
    #[ORM\Column]
    private ?int $dureeMax = null;

    #[ORM\Column(length: 255)]
    private ?string $type_adversaire = null;

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
    // Ajoutez un getter pour la propriété 'type' héritée de la classe parente 'Jeu'
    public function getType(): string
    {
        return 'duel';  // Cette valeur peut être utilisée pour spécifier le type dans le formulaire
    }

}
