<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 16:04
 */

namespace App\UI\Action\Security;

use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use App\Form\Type\Security\UserRegistrationType;
use App\UI\Action\Security\Interfaces\UserRegistrationActionInterface;
use App\UI\Responder\Security\Interfaces\UserRegistrationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserRegistrationAction
 * @Route(
 *     name="user_registration",
 *     path="/register",
 *     methods={"GET", "POST"}
 *     )
 */
final class UserRegistrationAction implements UserRegistrationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var UserRegistrationTypeHandlerInterface
     */
    private $formHandler;

    /**
     * @var UploadedFile
     */
    private $uploadedFile;


    /**
     * {@inheritdoc}
     */
    public function __construct(
        FormFactoryInterface                 $formFactory,
        UserRegistrationTypeHandlerInterface $formHandler
    ) {
        $this->formFactory = $formFactory;
        $this->formHandler = $formHandler;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request,
        UserRegistrationResponderInterface $responder
    ): Response {

        $type = $this->formFactory->create(UserRegistrationType::class)
                                     ->handleRequest($request);

        if($this->formHandler->handle($type)) {
            return $responder($request, true);
        }

        return $responder($request, false, $type);
    }
}
