<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/06/18
 * Time: 12:00
 */

namespace App\Form\Type;

use App\Entity\Group;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

class CreateTrickType extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
             ->add('title', TextType::class, [
                 'label_attr' => ['class' => 'label'],
                 'attr' => ['class' => 'input']
             ])

             ->add('description',TextareaType::class, [
                 'constraints' => [
                     new Length([
                         'min' => 10,
                         'max' => 800
                     ])
                 ],
                 'label_attr' => ['class' => 'label'],
                 'attr' => ['class' => 'textarea']
             ])

             ->add('group', EntityType::class, [
                 'class' => Group::class,
                 'label_attr' => ['class' => 'label'],
                 'choice_label' => 'name',

                 'allow_extra_fields' => true
             ])

             ->add('picture',FileType::class, [
                 'label_attr' => ['class' => 'label'],
                 'attr' => ['class' => 'file-input'],
                 'multiple' => true
             ])

             ->add('video', CollectionType::class, [
                 'attr' => ['class' => 'input'],
                 'entry_type' => TextType::class
             ])
         ;
     }

     public function configureOptions(OptionsResolver $resolver)
     {

     }
}
