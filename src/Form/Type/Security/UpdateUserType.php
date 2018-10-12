<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 13:39
 */

namespace App\Form\Type\Security;


use App\Domain\DTO\Security\Interfaces\UpdateUserDTOInterface;
use App\Form\Type\Security\Interfaces\UpdateUserTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class UpdateUserType
 *
 * @package App\Form\Type\Security
 */
final class UpdateUserType extends AbstractType implements UpdateUserTypeInterface
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'input'],
                'disabled'   => true
            ])

            ->add('nick', TextType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'input']
            ])

            ->add('password', PasswordType::class, [
                'label_attr' => ['class' => 'labe'],
                'required'   => true
            ])

            ->add('email', EmailType::class,[
                'label_attr' => ['class' => 'label'],
                'required'   => true
            ])

            ->add('photo', FileType::class, [
                'label_attr' => ['class' => 'label'],
                'attr'       => ['class' => 'file-input'],
                'multiple'   => false,
                'required'   => false,
                'data_class' => null
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UpdateUserDTOInterface::class
        ]);
    }

}
