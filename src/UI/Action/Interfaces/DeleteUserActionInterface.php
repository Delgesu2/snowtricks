<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/09/18
 * Time: 17:25
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Responder\Interfaces\DeleteUserResponderInterface;
use App\UI\Responder\Interfaces\UserListResponderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface DeleteUserActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface DeleteUserActionInterface
{
    /**
     * DeleteUserActionInterface constructor.
     *
     * @param UsersRepositoryInterface $repository
     * @param Filesystem $filesystem
     */
    public function __construct(
        UsersRepositoryInterface $repository,
        Filesystem               $filesystem
    );

    /**
     * @param UserListResponderInterface $responder
     * @param $user
     *
     * @return mixed
     */
    public function __invoke(DeleteUserResponderInterface $responder, Request $request);
}