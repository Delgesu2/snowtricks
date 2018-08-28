<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:12
 */

namespace App\Infra\Doctrine\Repository;

use App\Entity\Interfaces\CommentInterface;
use App\Entity\Comment;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;


class CommentsRepository extends ServiceEntityRepository implements CommentsRepositoryInterface
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Comment::class);
    }

    public function getAllComments()
    {
        return $this->createQueryBuilder('comments')
                    ->getQuery()
                    ->getResult();
    }

    public function getSelectedTrickComments($trick)
    {
       // return $this->createQueryBuilder()
    }

    public function save(CommentInterface $comment)   // ça va pas : il faut que je le lie au Trick concerné
    {
        $this->_em->persist($comment);
        $this->_em->flush();
    }
}