<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Comment;
use App\Form\CommentType;

class PageController extends AbstractController
{

    public function index()
    {
        return $this->render('index.html.twig');
    }
}
