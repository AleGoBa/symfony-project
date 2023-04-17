<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Comment;
class PageController extends AbstractController
{

    public function index(EntityManagerInterface $entityManager)
    {
        $comments = $entityManager->getRepository(Comment::class)->findBy([], [
            'id' => 'desc'
        ]);
       return $this->render('index.html.twig', compact('comments'));
    }
}
