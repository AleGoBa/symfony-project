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

    public function index(EntityManagerInterface $entityManager, Request $request)
    {
        $form = $this->createForm(CommentType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($form->getData());
            $entityManager->flush();

            $this->redirectToRoute('home');
        }

        $comments = $entityManager->getRepository(Comment::class)->findBy([], [
            'id' => 'desc'
        ]);

        return $this->render('index.html.twig',
            [
                'comments' => $comments,
                'form' => $form->createView()
            ]
        );
    }
}
