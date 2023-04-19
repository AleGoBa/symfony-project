<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\CommentType;
use App\Entity\Comment;

class CommentController extends AbstractController
{
    public function index(EntityManagerInterface $entityManager, Request $request)
    {
        $form = $this->createForm(CommentType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($form->getData());
            $entityManager->flush();
            $form = $this->createForm(CommentType::class);
            $this->addFlash('success', 'Your comment was added to comments list, check it out!');

            $this->redirectToRoute('home');
        }

        $comments = $entityManager->getRepository(Comment::class)->findBy([], [
            'id' => 'desc'
        ]);

        return $this->render('comment/index.html.twig',
            [
                'comments' => $comments,
                'form' => $form->createView()
            ]
        );
    }
}
