<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/09/18
 * Time: 18:18
 */

namespace App\Form\Handler\Security\Interfaces;

use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Form\FormInterface;

interface UserConnectionHandlerInterface
{
    /**
     * UserConnectionHandlerInterface constructor.
     *
     * @param ValidatorInterface $validator
     */
    public function __construct(
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}