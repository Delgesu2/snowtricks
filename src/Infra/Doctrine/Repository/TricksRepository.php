<?php

namespace App\Infra\Doctrine\Repository;

use App\Entity\Trick;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class TricksRepository extends ServiceEntityRepository implements TricksRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Trick::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllTricks()
    {
        return $this->createQueryBuilder('tricks')
                    ->getQuery()
                    ->getResult();
    }

    public function getOneTrick($slug)
    {
        return $this->createQueryBuilder('oneTrick')
            ->where('oneTrick.slug = :slug')
            ->setParameter('slug', $slug)
                    ->getQuery()
                    ->getOneOrNullResult();
    }
}