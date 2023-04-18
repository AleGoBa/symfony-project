<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ContactType;


class ContactController extends AbstractController
{

    public function index(Request $request)
    {
        /*  !Create form from scratch
            $form = $this->createFormBuilder()
                ->add('email', EmailType::class, [
                    'label' => 'Correo electrónico',
                    'help' => 'Ejemplo: ejemplo@gmail.com.mx'
                ])
                ->add('message', TextareaType::class, [
                    'label' => 'Mensaje'
                ])
                ->add('submit', SubmitType::class)
                ->setMethod('post')
                ->setAction('url')
                ->getForm();
        !*/

        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $this->addFlash('success', 'Your data was saved with success!');
        }

        return $this->render('contact/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
