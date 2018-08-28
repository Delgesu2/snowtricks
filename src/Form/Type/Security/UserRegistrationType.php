<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 28/08/18
 * Time: 18:09
 */

namespace App\Form\Type\Security;

use App\Domain\DTO\Security\UserRegistrationDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UserRegistrationType
 *
 * @package App\Form\Type\Security
 */
class UserRegistrationType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'input']
            ])

            ->add('photo', FileType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'file-input'],
                'multiple'   => false,
                'required'   => false
            ])

            ->add('nick', TextType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'input']
            ])

            ->add('password', PasswordType::class, [
                'label_attr' => ['class' => 'label'],
                'required'   => 'true'
            ])

            ->add('email', EmailType::class);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserRegistrationDTO::class,
            'empty_data' => function(FormInterface $form) {
                return new UserRegistrationDTO(
                    $form->get('name')      ->getData(),
                    $form->get('photo')     ->getData(),
                    $form->get('nick')      ->getData(),
                    $form->get('password')  ->getData()
                );
            }
        ]);
    }
}