<?php

namespace App\Entity;

use App\Entity\JeuCarte;
use App\Entity\JeuDuel;
use App\Entity\JeuPlateau;
use App\Repository\JeuRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuRepository::class)]
//Héritage
#[ORM\InheritanceType("SINGLE_TABLE")]
#[ORM\DiscriminatorColumn(name: "type", type:"string")]
#[ORM\DiscriminatorMap([
    "carte"         =>  JeuCarte::class,
    "duel"          =>  JeuDuel::class,
    "plateau"       => JeuPlateau::class
    ])]

class Jeu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $nb_participant = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getNbParticipant(): ?int
    {
        return $this->nb_participant;
    }

    public function setNbParticipant(int $nb_participant): static
    {
        $this->nb_participant = $nb_participant;

        return $this;
    }

}
