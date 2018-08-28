<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 28/08/18
 * Time: 23:28
 */

namespace App\Form\Type\Security\Interfaces;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

interface UserRegistrationTypeInterface
{
    /**
     * @param FormBuilderInterface $formBuilder
     * @param array $options
     *
     * @return mixed
     */
    public function buildForm(FormBuilderInterface $formBuilder, array $options);

    /**
     * @param OptionsResolver $resolver
     *
     * @return mixed
     */
    public function configureOptions(OptionsResolver $resolver);
}