<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 17:05
 */

namespace App\Form\Type;

use App\Domain\DTO\UpdateTrickDTO;
use App\Form\Type\Interfaces\UpdateTrickTypeInterface;
use App\Helper\DataTransformer;
use App\Domain\DTO\Interfaces\UpdateTrickDTOInterface;
use App\Domain\Entity\Group;
use App\Domain\Entity\Trick;
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


/**
 * Class UpdateTrickType
 *
 * @package App\Form\Type
 */

final class UpdateTrickType extends AbstractType implements UpdateTrickTypeInterface
{
    private $transformer;

    /**
     * @inheritdoc
     */
    public function __construct(DataTransformer $transformer)
    {
        $this->transformer = $transformer;
    }

    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('trick_name', TextType::class, [
                'label_attr'    => ['class' => 'label'],
                'attr'          => ['class' => 'input']
            ])

            ->add('description',TextareaType::class, [
                'constraints'   => [
                    new Length([
                        'min' => 10,
                        'max' => 800
                    ])
                ],
                'label_attr'    => ['class' => 'label'],
                'attr'          => ['class' => 'textarea']
            ])

            ->add('trick_group', EntityType::class, [
                'class'         => Group::class,
                'label_attr'    => ['class' => 'label'],
                'choice_label'  => 'name',

                'allow_extra_fields' => true
            ])

            ->add('photo',FileType::class, [
                'label_attr'    => ['class' => 'label'],
                'attr'          => ['class' => 'file-input'],
                'multiple'      => true,
                'required'      => false
            ])

            ->add('video', CollectionType::class, [
                'entry_type'        => TextType::class,
                'allow_add'         => true,
                'allow_delete'      => true,
                'prototype'         => true,
                'required'          => false,
                'invalid_message'   => 'Pas de lien vidéo'
            ])

        ;

        $builder->get('video')
            ->addModelTransformer($this->transformer);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UpdateTrickDTOInterface::class,
            'empty_data' => function(FormInterface $form) {
            return new UpdateTrickDTO(
                $form->get('trick_name')->getData(),
                $form->get('description')->getData(),
                $form->get('trick_group')->getData(),
                $form->get('photo')->getData(),
                $form->get('video')->getData()
                );
            },
            'validation_groups' => ['UpdateTrickDTO']
        ]);
    }
}
