<?php

namespace App\Factory;

use App\Entity\JeuPlateau;
use Zenstruck\Foundry\Persistence\PersistentProxyObjectFactory;

/**
 * @extends PersistentProxyObjectFactory<JeuPlateau>
 */
final class JeuPlateauFactory extends PersistentProxyObjectFactory
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
        return JeuPlateau::class;
    }

    /**
     * @see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories
     *
     * @todo add your default values here
     */
    protected function defaults(): array|callable
    {
        return [

            'dimension_plateau' => self::faker()->randomElement(['30x30 cm', '50x50 cm', '70x70 cm']),
            'nb_case' => self::faker()->numberBetween(10, 100),
            'nb_participant' => self::faker()->numberBetween(2, 6),
            'nom' => self::faker()->words(3, true), // Exemple : "Aventure épique"

            // 'dimension_plateau' => self::faker()->text(255),
            // 'nb_case' => self::faker()->randomNumber(),
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
            // ->afterInstantiate(function(JeuPlateau $jeuPlateau): void {})
        ;
    }
}
