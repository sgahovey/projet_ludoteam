<?php

namespace App\Repository;

use App\Entity\Jeu;
use App\Entity\JeuDuel;
use App\Entity\JeuCarte;
use App\Entity\JeuPlateau;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @extends ServiceEntityRepository<Jeu>
 */
class JeuRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Jeu::class);
    }

   /**
     * Récupère les attributs d'un jeu en fonction de son type.
     *
     * @param int $id L'ID du jeu
     * @return array Les attributs du jeu
     */
    public function findAttributsByJeuType(int $id): array
    {
        // Récupérer le jeu par son ID
        $jeu = $this->find($id);

        $attributs = [];

        // Déterminer le type de jeu et ajouter le type
        if ($jeu instanceof JeuCarte) {
            $attributs['type'] = 'Jeu de Carte';
            $attributs['format'] = $jeu->getFormat();
            $attributs['joker_inclus'] = $jeu->isJokerInclus() ? 'Oui' : 'Non';
        } elseif ($jeu instanceof JeuDuel) {
            $attributs['type'] = 'Jeu de Duel';
            $attributs['dureeMax'] = $jeu->getDureeMax();
            $attributs['type_adversaire'] = $jeu->getTypeAdversaire();
        } elseif ($jeu instanceof JeuPlateau) {
            $attributs['type'] = 'Jeu de Plateau';
            $attributs['dimension_plateau'] = $jeu->getDimensionPlateau();
            $attributs['nb_case'] = $jeu->getNbCase();
        }

        return $attributs;
    }
}
