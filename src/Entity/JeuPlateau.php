<?php

namespace App\Entity;

use App\Repository\JeuPlateauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: JeuPlateauRepository::class)]
class JeuPlateau extends Jeu

{
    #[ORM\Column(length: 255)]
    private ?string $dimension_plateau = null;

    #[ORM\Column]
    private ?int $nb_case = null;

    public function getDimensionPlateau(): ?string
    {
        return $this->dimension_plateau;
    }

    public function setDimensionPlateau(string $dimension_plateau): static
    {
        $this->dimension_plateau = $dimension_plateau;

        return $this;
    }

    public function getNbCase(): ?int
    {
        return $this->nb_case;
    }

    public function setNbCase(int $nb_case): static
    {
        $this->nb_case = $nb_case;

        return $this;
    }
}
