<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/09/18
 * Time: 21:01
 */

namespace App\UI\Action;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Action\Interfaces\UserListActionInterface;
use App\UI\Responder\Interfaces\UserListResponderInterface;
use Symfony\Component\Routing\Annotation\Route;


/**
 * Class UserListAction
 *
 * @Route(name="userlist", path="userlist")
 */
class UserListAction implements UserListActionInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @inheritdoc
     */
    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     */
    public function __invoke(UserListResponderInterface $responder)
    {
        $users = $this->repository->getAllUsers();

        return $responder($users);
    }
}