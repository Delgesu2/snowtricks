<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/06/18
 * Time: 12:00
 */

namespace App\Form\Type;

use App\Domain\DTO\NewTrickDTO;
use App\Entity\Group;
use App\Entity\Trick;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class CreateTrickType extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
             ->add('trick_name', TextType::class, [   //title
                 'label_attr'   => ['class' => 'label'],
                 'attr'         => ['class' => 'input']
             ])

             ->add('description',TextareaType::class, [
                 'constraints' => [
                     new Length([
                         'min' => 10,
                         'max' => 800
                     ])
                 ],
                 'label_attr' => ['class' => 'label'],
                 'attr'       => ['class' => 'textarea']
             ])

             ->add('trick_group', EntityType::class, [
                 'class'        => Group::class,
                 'label_attr'   => ['class' => 'label'],
                 'choice_label' => 'name',

                 'allow_extra_fields' => true
             ])

             ->add('photo',FileType::class, [
                 'label_attr' => ['class' => 'label'],
                 'attr'       => ['class' => 'file-input'],
                 'multiple'   => true,
                 'required'   => false
             ])

             ->add('video', CollectionType::class, [
                 'attr'         => ['class' => 'input'],
                 'label_attr'   => ['class' => 'label'],
                 'entry_type'   => TextType::class,
                 'allow_add'    => true,
                 'allow_delete' => true,
                 'prototype'    => true,
                 'required'     => false
             ])
         ;
     }

     public function configureOptions(OptionsResolver $resolver)
     {
         $resolver->setDefaults([
             'data_class' => NewTrickDTO::class,
             'empty_data' => function(FormInterface $form) {
                return new NewTrickDTO(
                    $form->get('trick_name')->getData(),
                    $form->get('description')->getData(),
                    $form->get('trick_group')->getData(),
                    $form->get('photo')->getData(),
                    $form->get('video')->getData()
                );
             }
         ]);
     }
}
