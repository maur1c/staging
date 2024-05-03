<?php
// src/Controller/MenuController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MenuController extends AbstractController
{
   #[Route('/menu', name: 'menu')]
   public function ajax(): Response
   {
       return $this->render('menu/menu.html.twig');
   }
}

