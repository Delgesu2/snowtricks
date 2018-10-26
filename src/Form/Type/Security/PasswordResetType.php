<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 12:39
 */

namespace App\Form\Type\Security;

use App\Domain\DTO\Security\PasswordCheckDTO;
use App\Form\Type\Security\Interfaces\PasswordResetTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class PasswordResetType
 *
 * @package App\Form\Type\Security
 */
final class PasswordResetType extends AbstractType implements PasswordResetTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('newpassword', PasswordType::class, [
                'label_attr' => ['class' => 'label'],
                'required'   => true
            ])

            ->add('checknewpassword', PasswordType::class, [
                'label_attr' => ['class' => 'label'],
                'required'   => true
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PasswordCheckDTO::class,
            'empty_data' => function(FormInterface $form) {
                return new PasswordCheckDTO(
                    $form->get('newpassword')->getData(),
                    $form->get('checknewpassword')->getData()
                );
            }
            //'validation_groups' => ['PasswordCheckDTO']
        ]);
    }
}

