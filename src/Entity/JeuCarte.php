<?php

namespace App\Entity;

use App\Repository\JeuCarteRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuCarteRepository::class)]
class JeuCarte extends Jeu

{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $format = null;

    #[ORM\Column]
    private ?bool $joker_inclus = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormat(): ?string
    {
        return $this->format;
    }

    public function setFormat(string $format): static
    {
        $this->format = $format;

        return $this;
    }

    public function isJokerInclus(): ?bool
    {
        return $this->joker_inclus;
    }

    public function setJokerInclus(bool $joker_inclus): static
    {
        $this->joker_inclus = $joker_inclus;

        return $this;
    }
}
