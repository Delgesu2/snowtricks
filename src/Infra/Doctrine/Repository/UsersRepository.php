<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 29/08/18
 * Time: 13:12
 */

namespace App\Infra\Doctrine\Repository;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Entity\User;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class UsersRepository extends ServiceEntityRepository implements UsersRepositoryInterface
{
    /**
     * UsersRepository constructor.
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function getAllUsers()
    {
        return $this->createQueryBuilder('users')
            ->orderBy('users.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function saveUser(UserTrickInterface $userTrick)
    {
        $this->_em->persist($userTrick);
        $this->_em->flush();
    }

    /**
     * @inheritdoc
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteUser($user)
    {
        $user = $this->createQueryBuilder('user')
            ->where('user.slug = :slug')
            ->setParameter('slug', $user)
            ->getQuery()
            ->getOneOrNullResult();
        $this->_em->remove($user);
        $this->_em->flush();
    }

    /**
     * @inheritdoc
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function checkToken($token)
    {
        return $this->createQueryBuilder('user')
            ->where('user.token = :token')
            ->setParameter('token', $token)
                ->getQuery()
                ->getOneOrNullResult();
    }

    public function update()
    {
        $this->_em->flush();
    }
}
