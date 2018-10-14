<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/10/18
 * Time: 23:36
 */

namespace App\Form\Type\Security;


use App\Domain\DTO\Security\EmailCheckDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class EmailCheckType
 *
 * @package App\Form\Type\Security
 */
final class EmailCheckType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', EmailType::class,[
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
            'data_class' => EmailCheckDTO::class,
            'empty_data' => function(FormInterface $form) {
                return new EmailCheckDTO(
                    $form->get('email')->getData()
                );
            }
        ]);
    }

}