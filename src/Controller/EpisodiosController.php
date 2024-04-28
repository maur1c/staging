<?php
// src/Controller/EpisodiosController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class EpisodiosController extends AbstractController
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/episodios', name: 'episodios')]  // Ruta para acceder a los episodios
    public function getEpisodes(): Response
    {
        try {
            // Hacer una solicitud GET a la API de episodios
            $response = $this->httpClient->request('GET', 'https://rickandmortyapi.com/api/episode');

            // Obtener los datos de la respuesta
            $data = $response->toArray();

            // Renderizar los datos obtenidos con una plantilla Twig
            return $this->render('rick/episodes.html.twig', [
                'episodes' => $data['results'], // Lista de episodios
            ]);
        } catch (\Exception $e) {
            return new Response("Error al obtener episodios: " . $e->getMessage());
        }
    }
}
