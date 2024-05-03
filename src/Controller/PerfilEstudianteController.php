<?php
// src/Controller/PostAjaxController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PerfilEstudianteController extends AbstractController
{
   #[Route('/perfil_estudiante', name: 'perfil_estudiante')]
   public function ajax(): Response
   {
       return $this->render('menu/perfil_estudiante.html.twig');
   }
}

