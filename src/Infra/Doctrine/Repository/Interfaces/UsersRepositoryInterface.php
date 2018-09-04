<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 29/08/18
 * Time: 13:36
 */

namespace App\Infra\Doctrine\Repository\Interfaces;


use App\Entity\Interfaces\UserTrickInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

interface UsersRepositoryInterface
{
    /**
     * UsersRepositoryInterface constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry);

    /**
     * @return mixed
     */
    public function getAllUsers();

    /**
     * @param UserTrickInterface $userTrick
     *
     * @return mixed
     */
    public function saveUser(UserTrickInterface $userTrick);

    /**
     * @param $user
     *
     * @return mixed
     */
    public function deleteUser($user);
}