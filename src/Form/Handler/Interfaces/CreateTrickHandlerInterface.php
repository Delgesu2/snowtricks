<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 14:48
 */

namespace App\Form\Handler\Interfaces;


use Symfony\Component\Form\FormInterface;

interface CreateTrickHandlerInterface
{
    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form) :bool ;
}
