<?php

namespace App\Form;

use App\Entity\Post;
use App\Entity\Category;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('category', EntityType::class, [
                'label' => 'Categoría',
                'class' => Category::class
            ])
            ->add('title', TextType::class, [
                'label' => 'Título del post',
                'help' => 'Escriba un título claro y conciso para el SEO.'
            ])
            ->add('body', TextareaType::class, [
                'label' => 'Contenido',
                'help' => 'Escriba el contenido relacionado con su post.'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Guardar',
                'attr' => [
                    'class' => 'btn-dark'
                ]
            ])
            ->setRequired(false);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
