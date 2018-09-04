<?php

namespace App\UI\Action\Security\Interfaces;

use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use App\UI\Responder\Security\Interfaces\UserRegistrationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Interface UserRegistrationActionInterface
 *
 * @ Xavier Coutant
 */
interface UserRegistrationActionInterface
{
    /**
     * UserRegistrationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        UserRegistrationTypeHandlerInterface $typeHandler
);

    /**
     * @param Request $request
     * @param UserRegistrationResponderInterface $responder
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        UserRegistrationResponderInterface $responder
    ): Response;
}