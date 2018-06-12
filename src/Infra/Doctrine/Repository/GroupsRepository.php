<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 11/06/18
 * Time: 21:32
 */

namespace App\Infra\Doctrine\Repository;

use App\Entity\Group;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class GroupsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Group::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllGroups()
    {
        return $this->createQueryBuilder('groups')
            ->getQuery()
            ->getResult();
    }
}