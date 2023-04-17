<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController
{

    public function index(Request $request): Response
    {
        $name = $request->get('name', 'sin nombre');
        return new Response("Bienvenido {$name}.");
    }
}
