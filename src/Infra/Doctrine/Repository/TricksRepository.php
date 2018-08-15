<?php

namespace App\Infra\Doctrine\Repository;

use App\Entity\Interfaces\TrickInterface;
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

    /**
     * @param $slug
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getOneTrick($slug)
    {
        return $this->createQueryBuilder('oneTrick')
            ->where('oneTrick.slug = :slug')
            ->setParameter('slug', $slug)
                    ->getQuery()
                    ->getOneOrNullResult();
    }

    /**
     * @param TrickInterface $trick
     * @return mixed|void
     */
    public function save(TrickInterface $trick)
    {
        $this->_em->persist($trick);
        $this->_em->flush();
    }

    public function deleteTrick($slug)
    {
        $trick = $this->createQueryBuilder('trick')
            ->where('trick.slug = :slug')
            ->setParameter('slug', $slug)
                ->getQuery()
                ->getOneOrNullResult();
        $this->_em->remove($trick);
        $this->_em->flush();
    }
}