<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/09/18
 * Time: 21:10
 */

namespace App\UI\Action\Security;

use App\UI\Action\Security\Interfaces\UserConnectionActionInterface;
use App\UI\Action\Security\Interfaces\UserConnectionResponderInterface;
use http\Env\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserConnectionAction
 * @Route(
 *     name="user_connection",
 *     path="/connection",
 *     methods={"GET","POST"}
 *     )
 */
class UserConnectionAction implements UserConnectionActionInterface
{
    /**
     * @inheritdoc
     */
    public function __construct(
        FormFactoryInterface               $formFactory,
        UserConnectionTypeHandlerInterface $typeHandler
    ) {
        $this->formFactory = $formFactory;
        $this->typeHandler = $typeHandler;
    }

    /**
     * @inheritdoc
     */
    public function __invoke(
        Request $request,
        UserConnectionResponderInterface $responder
    ): Response {

        $type = $this->formFactory->create(UserConnectionType::class)
                                    ->handleRequest($request);
    }
}