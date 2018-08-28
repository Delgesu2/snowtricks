<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:09
 */

namespace App\Form\Handler\Security\Interfaces;


use Symfony\Component\Form\FormInterface;

interface UserRegistrationTypeHandlerInterface
{
    public function handle(FormInterface $form): bool;
}