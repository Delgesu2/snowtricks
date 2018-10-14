<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 00:11
 */

namespace App\Form\Type\Security\Interfaces;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface EmailCheckTypeInterface
 *
 * @package App\Form\Type\Security\Interfaces
 */
interface EmailCheckTypeInterface
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