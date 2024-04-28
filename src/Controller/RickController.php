<?php
// src/Controller/PostAjaxController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RickController extends AbstractController
{
   #[Route('Rick', name: 'Rick')]
   public function ajax(): Response
   {
       return $this->render('Rick/index.html.twig');
   }
}

