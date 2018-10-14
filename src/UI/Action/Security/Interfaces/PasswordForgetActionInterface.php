<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 00:05
 */

namespace App\UI\Action\Security\Interfaces;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Form\Handler\Security\Interfaces\EmailCheckHandlerInterface;
use App\UI\Responder\Interfaces\PasswordForgetResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface PasswordForgetActionInterface
 *
 * @package App\UI\Action\Security\Interfaces
 */
interface PasswordForgetActionInterface
{
    /**
     * PasswordForgetActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param EmailCheckHandlerInterface $handler
     */
    public function __construct(
        FormFactoryInterface       $formFactory,
        EmailCheckHandlerInterface $handler
    );

    /**
     * @param Request $request
     * @param PasswordForgetResponderInterface $responder
     * @param UserTrickInterface $user
     *
     * @return mixed
     */
    public function __invoke(
        Request                          $request,
        PasswordForgetResponderInterface $responder,
        UserTrickInterface               $user
    );
}