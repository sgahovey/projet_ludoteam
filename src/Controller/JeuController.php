<?php

namespace App\Controller;

use App\Repository\JeuRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class JeuController extends AbstractController
{
    #[Route('/jeu', name: 'app_jeu')]
    public function index(JeuRepository $jeuRepository): Response
    {
        // Récupérer tous les jeux depuis la base de données
        $jeux = $jeuRepository->findAll();

        return $this->render('jeu/index.html.twig', [
            'jeux' => $jeux,
        ]);
    }
}
