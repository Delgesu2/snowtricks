<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/09/18
 * Time: 17:32
 */

namespace App\UI\Action\Security\Interfaces;

use App\Infra\Doctrine\Repository\UsersRepository;
use App\UI\Responder\Security\UserRegistrationCheckResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * Interface UserRegistrationCheckActionInterface
 *
 * @package App\UI\Action\Security\Interfaces
 */
interface UserRegistrationCheckActionInterface
{
    /**
     * UserRegistrationCheckActionInterface constructor.
     *
     * @param UsersRepository $repository
     */
    public function __construct(UsersRepository $repository);

    /**
     * @param UserRegistrationCheckResponder $responder
     * @param $token
     *
     * @return mixed
     */
    public function __invoke(
        Request                        $request,
        UserRegistrationCheckResponder $responder,
        SessionInterface               $session
    );

}