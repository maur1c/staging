<?php
// src/Controller/SpeciesController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class SpeciesController extends AbstractController
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    #[Route('/species', name: 'species')]  // Ruta para acceder a las especies
    public function getSpecies(): Response
    {
        try {
            // Hacer una solicitud GET a la API de especies
            $response = $this->httpClient->request('GET', 'http://swapi.dev/api/species/3/');

            // Obtener los datos de la respuesta
            $data = $response->toArray();

            // Renderizar los datos obtenidos con una plantilla Twig
            return $this->render('menu/species.html.twig', [
                'species' => $data, // Datos de la especie
            ]);
        } catch (\Exception $e) {
            return new Response("Error al obtener las especies: " . $e->getMessage());
        }
    }
}