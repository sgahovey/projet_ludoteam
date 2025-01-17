<?php
// src/Form/JeuType.php
namespace App\Form;

use App\Entity\Jeu;
use App\Entity\JeuCarte;
use App\Entity\JeuDuel;
use App\Entity\JeuPlateau;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class JeuType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'label' => 'Nom du Jeu',
            ])
            ->add('nbParticipant', IntegerType::class, [
                'label' => 'Nombre de Participants',
            ])
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'Jeu de Carte' => 'JeuCarte',
                    'Jeu de Duel' => 'JeuDuel',
                    'Jeu de Plateau' => 'JeuPlateau',
                ],
                'label' => 'Type de Jeu',
                'mapped' => false,  // Désactive le mappage de la propriété 'type'
            ]);

        // Ajouter des champs conditionnellement en fonction du type de jeu
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            $jeu = $event->getData();

            // Si aucune donnée n'est définie, on ne fait rien
            if (!$jeu) {
                return;
            }

            // Vérifier l'instance de l'objet pour ajouter des champs spécifiques
            if ($jeu instanceof JeuCarte) {
                $form->add('format', TextType::class, ['label' => 'Format du Jeu de Cartes']);
                $form->add('joker_inclus', ChoiceType::class, [
                    'choices' => ['Oui' => true, 'Non' => false],
                    'label' => 'Joker Inclus'
                ]);
            } elseif ($jeu instanceof JeuDuel) {
                $form->add('dureeMax', IntegerType::class, [
                    'label' => 'Durée Maximale (en minutes)',
                ]);
                $form->add('type_adversaire', TextType::class, [
                    'label' => 'Type d\'Adversaire',
                ]);
            } elseif ($jeu instanceof JeuPlateau) {
                $form->add('dimension_plateau', TextType::class, [
                    'label' => 'Dimensions du Plateau',
                ]);
                $form->add('nb_case', IntegerType::class, [
                    'label' => 'Nombre de Cases',
                ]);
            }
        });

        // Pas de bouton de soumission ici
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Jeu::class,  // Définit l'entité sur laquelle le formulaire est basé
        ]);
    }
}
