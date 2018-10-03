<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 21:54
 */

namespace App\Form\Type\Security\Interfaces;


use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Interface UpdateUserTypeInterface
 *
 * @package App\Form\Type\Security\Interfaces
 */
interface UpdateUserTypeInterface
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