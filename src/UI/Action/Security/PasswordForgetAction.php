<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/10/18
 * Time: 22:07
 */

namespace App\UI\Action\Security;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Form\Handler\Security\Interfaces\EmailCheckHandlerInterface;
use App\Form\Type\Security\EmailCheckType;
use App\UI\Action\Security\Interfaces\PasswordForgetActionInterface;
use App\UI\Responder\Interfaces\PasswordForgetResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PasswordForgetAction
 *
 * @Route(
 *      name="password_forget",
 *      path="forget"
 *      )
 */
final class PasswordForgetAction implements PasswordForgetActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EmailCheckHandlerInterface
     */
    private $formHandler;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        FormFactoryInterface       $formFactory,
        EmailCheckHandlerInterface $handler
    )
    {
        $this->formFactory = $formFactory;
        $this->formHandler = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request                          $request,
        PasswordForgetResponderInterface $responder,
        UserTrickInterface               $user
    ): Response {

        $emailCheckType = $this->formFactory->create(EmailCheckType::class)
                                ->handleRequest($request);

        if ($this->formHandler->handle($emailCheckType, $user)) {
            return $responder($request, true);

        }

        return $responder($request, false, $emailCheckType);

    }

}
