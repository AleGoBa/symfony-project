<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends AbstractController
{

    public function index(Request $request): Response
    {
        $search = $request->get('search', "There's nothing to search");
        return $this->render('index.html.twig', compact('search'));
    }
}
