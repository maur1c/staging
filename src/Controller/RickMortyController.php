<?php
// src/Controller/RickMortyController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RickMortyController extends AbstractController
{
    #[Route('/RickMorty', name: 'RickMorty')]
    public function ajax(): Response
    {
        return $this->render('Rick/RickMorty.html.twig');
    }
}
