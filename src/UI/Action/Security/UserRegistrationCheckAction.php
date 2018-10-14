<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 09/09/18
 * Time: 16:59
 */

namespace App\UI\Action\Security;

use App\Infra\Doctrine\Repository\UsersRepository;
use App\UI\Action\Security\Interfaces\UserRegistrationCheckActionInterface;
use App\UI\Responder\Security\UserRegistrationCheckResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="registration_check",
 *     path="/validation/{token}"
 *      )
 */
final class UserRegistrationCheckAction implements UserRegistrationCheckActionInterface
{
    /**
     * @var UsersRepository
     */
    private $repository;

    /**
     * {@inheritdoc}
     */
    public function __construct(UsersRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request                        $request,
        UserRegistrationCheckResponder $responder,
        SessionInterface               $session
    )
    {
        $user = $this->repository->checkToken($request->attributes->get('token'));

        if ($user){

            $user->validate();

            $request->getSession()->getFlashBag()->add('Succes','Enregistrement réussi.');

            $this->repository->update();

            return $responder();
        }

        $request->getSession()->getFlashBag()->add('Fail', 'Enregistrement annulé.');

            return $responder();
    }
}
