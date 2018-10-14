<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 21:58
 */

namespace App\UI\Action\Security;

use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Action\Security\Interfaces\PasswordResetActionInterface;
use App\UI\Responder\Security\Interfaces\PasswordResetResponderInterface;
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
     * {@inheritdoc}
     */
    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request                         $request,
        PasswordResetResponderInterface $responder,
        SessionInterface                $session
    )
    {
        $user = $this->repository->checkToken($request->attributes->get('token'));

        if ($user) {

            $request->getSession()->getFlashBag()->add('Succes','Adresse courriel vérifié.
            Accès au formulaire de réinitialisation du mot de passe.');

            return $responder;

        }

    }

}
