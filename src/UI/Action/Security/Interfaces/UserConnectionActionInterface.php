<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/09/18
 * Time: 21:12
 */

namespace App\UI\Action\Security\Interfaces;


use App\Form\Handler\Security\Interfaces\UserConnectionHandlerInterface;
use App\UI\Responder\Security\Interfaces\UserConnectionResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

interface UserConnectionActionInterface
{
    /**
     * UserConnectionActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param UserConnectionHandlerInterface $typeHandler
     */
    public function __construct(
        FormFactoryInterface           $formFactory,
        UserConnectionHandlerInterface $handler
    );

    /**
     * @param Request $request
     * @param UserConnectionResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request                          $request,
        UserConnectionResponderInterface $responder
    );
}