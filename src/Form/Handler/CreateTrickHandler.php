<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;


use Symfony\Component\Form\FormInterface;

class CreateTrickHandler
{
    public function handle(FormInterface $form) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {
            //move()
            return true;
        }
            return false;
    }
}