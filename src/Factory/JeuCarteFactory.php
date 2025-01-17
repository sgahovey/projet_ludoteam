<?php

namespace App\Factory;

use App\Entity\JeuCarte;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<JeuCarte>
 */
final class JeuCarteFactory extends PersistentProxyObjectFactory
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
        return JeuCarte::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [
            'format' => self::faker()->randomElement(['Tarot', 'Poker', 'Uno']),
            'joker_inclus' => self::faker()->boolean(),
            'nb_participant' => self::faker()->numberBetween(2, 10),
            'nom' => self::faker()->words(3, true), // Exemple : "Jeu de cartes fantastique"

            // 'format' => self::faker()->text(255),
            // 'joker_inclus' => self::faker()->boolean(),
            // 'nb_participant' => self::faker()->randomNumber(),
            // 'nom' => self::faker()->text(255),
        ];
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
     */
    protected function initialize(): static
    {
        return $this
            // ->afterInstantiate(function(JeuCarte $jeuCarte): void {})
        ;
    }
}
