<?php
// src/DataFixtures/AppFixtures.php
namespace App\DataFixtures;

use App\Entity\User;
use App\Factory\JeuDuelFactory;
use App\Factory\JeuCarteFactory;
use App\Factory\JeuPlateauFactory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Générer des utilisateurs
        $faker = Factory::create();
        $users = [];
        for ($i = 0; $i < 10; $i++) {
            $user = new User();
            $user->setEmail($faker->email);
            $user->setPassword($faker->password);  // Vous devez hasher le mot de passe pour un vrai cas
            $user->setName($faker->name);
            $manager->persist($user);
            $users[] = $user;
        }

        // Générer des jeux de cartes
        $jeuxCarte = JeuCarteFactory::new()->createMany(5);
        foreach ($jeuxCarte as $jeu) {
            // Associer des participants à chaque jeu
            $participants = array_slice($users, 0, rand(2, 5));  // Choisir entre 2 et 5 participants
            foreach ($participants as $participant) {
                $jeu->addParticipant($participant);
            }
        }

        // Générer des jeux de duel
        $jeuxDuel = JeuDuelFactory::new()->createMany(5);
        foreach ($jeuxDuel as $jeu) {
            // Associer des participants à chaque jeu
            $participants = array_slice($users, 0, rand(2, 5));  // Choisir entre 2 et 5 participants
            foreach ($participants as $participant) {
                $jeu->addParticipant($participant);
            }
        }

        // Générer des jeux de plateau
        $jeuxPlateau = JeuPlateauFactory::new()->createMany(5);
        foreach ($jeuxPlateau as $jeu) {
            // Associer des participants à chaque jeu
            $participants = array_slice($users, 0, rand(2, 5));  // Choisir entre 2 et 5 participants
            foreach ($participants as $participant) {
                $jeu->addParticipant($participant);
            }
        }

        $manager->flush();
    }
}
