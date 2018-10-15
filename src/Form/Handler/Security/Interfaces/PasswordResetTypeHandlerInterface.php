<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 12:30
 */

namespace App\Form\Handler\Security\Interfaces;


use App\Domain\Entity\User;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface PasswordResetTypeHandlerInterface
{
    /**
     * PasswordResetTypeHandlerInterface constructor.
     *
     * @param ValidatorInterface $validator
     * @param UsersRepositoryInterface $repository
     * @param EncoderFactoryInterface $encoderFactory
     */
    public function __construct(
        ValidatorInterface       $validator,
        UsersRepositoryInterface $repository,
        EncoderFactoryInterface  $encoderFactory
    );

    /**
     * @param FormInterface $form
     * @param $user
     *
     * @return mixed
     */
    public function handle(
        FormInterface $form,
        $user);
}