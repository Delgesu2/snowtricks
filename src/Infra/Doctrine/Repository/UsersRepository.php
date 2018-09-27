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
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;


/**
 * Class UsersRepository
 *
 * @package App\Infra\Doctrine\Repository
 */
final class UsersRepository extends ServiceEntityRepository implements UsersRepositoryInterface

{
    /**
     * UsersRepository constructor.
     *
     * {@inheritdoc}
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, User::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllUsers()
    {
        return $this->createQueryBuilder('users')
            ->orderBy('users.name', 'ASC')
            ->getQuery()
            ->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function saveUser(UserTrickInterface $userTrick)
    {
        $this->_em->persist($userTrick);
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
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
     * {@inheritdoc}
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

    /**
     * @inheritdoc
     */

    public function update()
    {
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function loadUserByUsername($username)
    {
        return $this->createQueryBuilder('u')
            ->where('u.name = :name OR u.email = :email')
            ->setParameter('name', $username)
            ->setParameter('email', $username)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
