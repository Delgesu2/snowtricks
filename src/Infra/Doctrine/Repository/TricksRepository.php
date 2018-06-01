<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 30/04/18
 * Time: 17:20
 */

namespace App\Infra\Doctrine\Repository;

use App\Entity\Trick;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

class TricksRepository extends ServiceEntityRepository
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