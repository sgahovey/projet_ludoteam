<?php

namespace App\DataFixtures;

use App\Entity\Jeu;
use App\Entity\JeuCarte;
use App\Entity\JeuDuel;
use App\Entity\JeuPlateau;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
     // Création de jeux de cartes
     for ($i = 0; $i < 5; $i++) {
        $jeuCarte = new JeuCarte();
        $jeuCarte->setNom('Jeu de Cartes ' . $i);
        $jeuCarte->setNbParticipant(rand(2, 10));
        $jeuCarte->setFormat('Tarot');
        $jeuCarte->setJokerInclus((bool) rand(0, 1));
        $manager->persist($jeuCarte);
    }
    }
}
