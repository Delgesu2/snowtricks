<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:12
 */

namespace App\Infra\Doctrine\Repository;

use App\Domain\Entity\Interfaces\CommentInterface;
use App\Domain\Entity\Comment;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;

/**
 * Class CommentsRepository
 *
 * @package App\Infra\Doctrine\Repository
 */
final class CommentsRepository extends ServiceEntityRepository implements CommentsRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    /**
     * {@inheritdoc}
     */
    public function getAllComments()
    {
        return $this->createQueryBuilder('comments')
                    ->getQuery()
                    ->getResult();
    }

    /**
     * {@inheritdoc}
     */
    public function getSelectedTrickComment($trick)
    {
       // return $this->createQueryBuilder()
    }

    /**
     * {@inheritdoc}
     */
    public function save(CommentInterface $comment)   // ça va pas : il faut que je le lie au Trick concerné
    {
        $this->_em->persist($comment);
        $this->_em->flush();
    }

    public function deleteComment($comment)
    {
        $comment = $this->createQueryBuilder($comment)
            ->where('comment.outset = :outset')
            ->setParameter('outset', $comment)
                ->getQuery()
                ->getOneOrNullResult();
        $this->_em->remove($comment);
        $this->_em->flush();

    }
}