<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 00:11
 */

namespace App\Form\Type;

use App\Domain\DTO\NewCommentDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;

final class CommentType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('text', TextareaType::class, [
                'constraints' => [
                    new Length([
                        'min'=>10,
                        'max'=>500
                    ])
                ],
                'attr' => ['class' => 'textarea']
            ])
        ;
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => NewCommentDTO::class,
            'empty_data' => function(FormInterface $form) {
                return new NewCommentDTO(
                    $form->get('text')->getData()
                );
            }
        ]);
    }
}