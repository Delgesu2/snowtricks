<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 22:02
 */

namespace App\UI\Action\Security\Interfaces;


use App\Form\Handler\Security\Interfaces\PasswordResetTypeHandlerInterface;
use App\Helper\LoginAuthenticator;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Responder\Security\Interfaces\PasswordResetResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface PasswordResetActionInterface
{
    /**
     * PasswordResetActionInterface constructor.
     *
     * @param UsersRepositoryInterface $repository
     * @param FormFactoryInterface $formFactory
     * @param PasswordResetTypeHandlerInterface $handler
     * @param LoginAuthenticator $authenticator
     */
    public function __construct(
        UsersRepositoryInterface          $repository,
        FormFactoryInterface              $formFactory,
        PasswordResetTypeHandlerInterface $handler,
        LoginAuthenticator                $authenticator
    );

    /**
     * @param Request                         $request
     * @param PasswordResetResponderInterface $responder
     * @param SessionInterface                $session
     *
     * @return mixed
     */
    public function __invoke(
        Request                         $request,
        SessionInterface                $session,
        PasswordResetResponderInterface $responder
    );

}