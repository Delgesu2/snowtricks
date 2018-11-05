<?php

namespace App\Infra\Doctrine\Repository;

use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Trick;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class TricksRepository
 *
 * @package App\Infra\Doctrine\Repository
 */
final class TricksRepository extends ServiceEntityRepository implements TricksRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
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
     * {@inheritdoc}
     *
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
     * {@inheritdoc}
     */
    public function save(TrickInterface $trick)
    {
        $this->_em->persist($trick);
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function update()
    {
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function deleteTrick($trick)
    {
        $this->_em->remove($trick);
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException

    public function deleteTrick($trick)
    {
        $trick = $this->createQueryBuilder('trick')
            ->where('trick.slug = :slug')
            ->setParameter('slug', $trick)
                ->getQuery()
                ->getOneOrNullResult();
        $this->_em->remove($trick);
        $this->_em->flush();
    }
     **/
}
