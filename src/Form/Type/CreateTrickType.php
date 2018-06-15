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
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;

class CreateTrickType extends AbstractType
{
     public function buildForm(FormBuilderInterface $builder, array $options)
     {
         $builder
             ->add('title', TextType::class)
             ->add('description',TextareaType::class, [
                 'constraints' => [
                     new Length([
                         'min' => 10,
                         'max' => 800
                     ])
                 ]
             ])
             ->add('group', EntityType::class, array(
                 'class' => Group::class,
                 'choice_label' => 'name'
             ))
             ->add('picture',FileType::class )
             ->add('video', UrlType::class)
         ;
     }
}
