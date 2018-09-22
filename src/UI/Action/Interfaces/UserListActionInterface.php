<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/09/18
 * Time: 21:17
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Responder\Interfaces\UserListResponderInterface;

/**
 * Interface UserListActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface UserListActionInterface
{
    /**
     * UserListActionInterface constructor.
     *
     * @param UsersRepositoryInterface $repository
     */
    public function __construct(UsersRepositoryInterface $repository);

    /**
     * @param UserListResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(UserListResponderInterface $responder);
}