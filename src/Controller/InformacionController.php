<?php
// src/Controller/PostAjaxController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;


class InformacionController extends AbstractController
{
    #[Route('/informacion', name: 'informacion')]
    public function informacion(): Response
    {
        // Aquí va la lógica para renderizar la página de información
        return $this->render('Rick/informacion.html.twig');
    }
}
