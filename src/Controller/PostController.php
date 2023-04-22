<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Form\PostType;
use App\Entity\Post;
use Symfony\Component\HttpFoundation\Request;

class PostController extends AbstractController
{
    public function index(EntityManagerInterface $entityManager)
    {
        $posts = $entityManager->getRepository(Post::class)->findBy([], [
            'id' => 'desc'
        ]);
        return $this->render('post/index.html.twig', compact('posts'));
    }
    public function create(Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(PostType::class);
        $form->handleRequest($request);
         if ($form->isSubmitted() && $form->isValid()){
             $entityManager->persist($form->getData());
             $entityManager->flush();
             $this->addFlash('success', 'Post guardado con exito uwu');
             return $this->redirectToRoute('posts_index');
         }

        return $this->render('post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    public function edit(Post $post, Request $request, EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->flush();
            $this->addFlash('success', 'Post editado con exito uwu');
            return $this->redirectToRoute('posts_edit', ['post' => $post->getId()]);
        }

        return $this->render('post/edit.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
