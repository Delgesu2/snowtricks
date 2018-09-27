<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/09/18
 * Time: 21:30
 */

namespace App\Form\Type\Security\Interfaces;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface UserConnectionTypeInterface
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
