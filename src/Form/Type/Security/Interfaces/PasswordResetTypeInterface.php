<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 12:39
 */

namespace App\Form\Type\Security\Interfaces;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface PasswordResetTypeInterface
 *
 * @package App\Form\Type\Security\Interfaces
 */
interface PasswordResetTypeInterface
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     *
     * @return mixed
     */
    public function buildForm(FormBuilderInterface $builder, array $options);

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed
     */
    public function configureOptions(OptionsResolver $resolver);


}