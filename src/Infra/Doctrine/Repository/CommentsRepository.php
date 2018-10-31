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
    public function save(CommentInterface $comment)
    {
        $this->_em->persist($comment);
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteComment($comment)
    {
        $comment = $this->createQueryBuilder('comment')
            ->where('comment.slug = :slug')
            ->setParameter('slug', $comment)
                ->getQuery()
                ->getOneOrNullResult();
        $this->_em->remove($comment);
        $this->_em->flush();
    }

}