<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 22:02
 */

namespace App\UI\Action\Security\Interfaces;


use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Responder\Security\Interfaces\PasswordResetResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface PasswordResetActionInterface
{
    /**
     * PasswordResetActionInterface constructor.
     *
     * @param UsersRepositoryInterface $repository
     */
    public function __construct(UsersRepositoryInterface $repository);

    /**
     * @param Request                         $request
     * @param PasswordResetResponderInterface $responder
     * @param SessionInterface                $session
     *
     * @return mixed
     */
    public function __invoke(
        Request                         $request,
        PasswordResetResponderInterface $responder,
        SessionInterface                $session
    );

}