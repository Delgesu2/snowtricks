<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/09/18
 * Time: 21:30
 */

namespace App\Form\Type\Security;

use App\Form\Type\Security\Interfaces\UserConnectionTypeInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Domain\DTO\Security\UserConnectionDTO;
/**
 * Class UserConnectionType
 *
 * @package App\Form\Type\Security
 */
final class UserConnectionType extends AbstractType implements UserConnectionTypeInterface
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'label'],
                'required'   => true
            ])
            ->add('password', PasswordType::class, [
                'label_attr' => ['class' => 'label'],
                'required'   => true
            ]);
    }

    /**
     * @inheritdoc
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => UserConnectionDTO::class,
            'empty_data' => function(FormInterface $form) {
                return new UserConnectionDTO(
                    $form->get('name')  ->getData(),
                    $form->get('password') ->getData(),
                    $form->get('keep') ->getData()
                );
            }
        ]);
    }
}