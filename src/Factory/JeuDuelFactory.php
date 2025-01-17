<?php

namespace App\Factory;

use App\Entity\JeuDuel;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<JeuDuel>
 */
final class JeuDuelFactory extends PersistentProxyObjectFactory
{
    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services
     *
     * @todo inject services if required
     */
    public function __construct()
    {
    }

    public static function class(): string
    {
        return JeuDuel::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [

            'dureeMax' => self::faker()->numberBetween(30, 120),    // Durée en minutes
            'nb_participant' => 2,                                  // Les jeux de duel impliquent 2 participants
            'nom' => self::faker()->words(3, true),                  // Exemple : "Combat épique"
            'type_adversaire' => self::faker()->randomElement(['Robot', 'Humain']), // Valeurs réalistes

            // 'dureeMax' => self::faker()->randomNumber(),
            // 'nb_participant' => self::faker()->randomNumber(),
            // 'nom' => self::faker()->text(255),
            // 'type_adversaire' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(JeuDuel $jeuDuel): void {})
        ;
    }
}
