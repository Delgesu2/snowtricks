<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/09/18
 * Time: 21:10
 */

namespace App\UI\Action\Security;

use App\Form\Handler\Security\Interfaces\UserConnectionHandlerInterface;
use App\Form\Type\Security\UserConnectionType;
use App\UI\Action\Security\Interfaces\UserConnectionActionInterface;
use App\UI\Responder\Security\Interfaces\UserConnectionResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class UserConnectionAction
 *
 * @Route(
 *     name="user_connection",
 *     path="/connection",
 *     methods={"GET","POST"}
 *     )
 */
class UserConnectionAction implements UserConnectionActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @inheritdoc
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    /**
     * @inheritdoc
     */
    public function __invoke(
        Request $request,
        UserConnectionResponderInterface $responder
    ): Response {

        $connectionType = $this->formFactory->create(UserConnectionType::class)
                                    ->handleRequest($request);

        return $responder($connectionType);
    }
}