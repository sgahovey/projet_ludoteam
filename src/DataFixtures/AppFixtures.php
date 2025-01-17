<?php

namespace App\DataFixtures;

use App\Factory\JeuDuelFactory;
use App\Factory\JeuCarteFactory;
use App\Factory\JeuPlateauFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Générer des jeux de cartes
        JeuCarteFactory::new()->createMany(5);

        // Générer des jeux de duel
        JeuDuelFactory::new()->createMany(5);

        // Générer des jeux de plateau
        JeuPlateauFactory::new()->createMany(5);

        $manager->flush();
    }
}
