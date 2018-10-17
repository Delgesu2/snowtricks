<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 21:58
 */

namespace App\UI\Action\Security;

use App\Form\Handler\Security\Interfaces\PasswordResetTypeHandlerInterface;
use App\Form\Type\Security\PasswordResetType;
use App\Helper\LoginAuthenticator;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Action\Security\Interfaces\PasswordResetActionInterface;
use App\UI\Responder\Security\Interfaces\PasswordResetResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class PasswordResetAction
 *
 * @Route(
 *     name="passwordreset",
 *     path="/passwordreset/{token}"
 *     )
 */
class PasswordResetAction implements PasswordResetActionInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var PasswordResetTypeHandlerInterface
     */
    private $handler;

    /**
     * @var LoginAuthenticator
     */
    private $authenticator;


    /**
     * {@inheritdoc}
     */
    public function __construct(
        UsersRepositoryInterface          $repository,
        FormFactoryInterface              $formFactory,
        PasswordResetTypeHandlerInterface $handler,
        LoginAuthenticator                $authenticator
    )
    {
        $this->repository  = $repository;
        $this->formFactory = $formFactory;
        $this->handler     = $handler;
        $this->authenticated = $authenticator;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request                         $request,
        SessionInterface                $session,
        PasswordResetResponderInterface $responder
    )
    {
        $user = $this->repository->checkToken($request->attributes->get('token'));

        if ($user) {



            // Success !!
            $request->getSession()->getFlashBag()->add('Succes','Adresse courriel vérifiée.
            Accès au formulaire de réinitialisation du mot de passe.');

            // Create Form for new password
            $type = $this->formFactory->create(PasswordResetType::class)
                                ->handleRequest($request);

            //  Le responder envoie la vue si valide
            if ($this->handler->handle($type, $user)) {
                return $responder($type);
            }

            return $responder($type, false);

        }
            return false;
    }

}
