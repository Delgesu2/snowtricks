<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/09/18
 * Time: 17:32
 */

namespace App\UI\Action\Security\Interfaces;

use App\Infra\Doctrine\Repository\UsersRepository;
use App\UI\Responder\Security\Interfaces\UserRegistrationCheckResponderInterface;
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
     * @param Request                                 $request
     * @param UserRegistrationCheckResponderInterface $responder
     * @param SessionInterface                        $session
     *
     * @return mixed
     */
    public function __invoke(
        Request                                 $request,
        UserRegistrationCheckResponderInterface $responder,
        SessionInterface                        $session
    );

}