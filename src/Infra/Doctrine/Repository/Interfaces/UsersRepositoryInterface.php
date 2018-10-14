<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 29/08/18
 * Time: 13:36
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Interface UsersRepositoryInterface
 *
 * @package App\Infra\Doctrine\Repository\Interfaces
 */
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
     * @return mixed
     */
    public function getAllEmails();

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
    public function getUserBySlug($user);

    /**
     * @param $user
     *
     * @return mixed
     */
    public function deleteUser($user);

    /**
     * @param $token
     *
     * @return mixed
     */
    public function checkToken($token);

    /**
     * @return mixed
     */
    public function update();

    /**
     * @param $username
     *
     * @return mixed|null|\Symfony\Component\Security\Core\User\UserInterface
     */
    public function loadUserByUsername($username);
}
