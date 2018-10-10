<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:21
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

use App\Domain\Entity\Interfaces\CommentInterface;
use App\Domain\Factory\Interfaces\CommentFactoryInterface;

/**
 * Interface CommentsRepositoryInterface
 *
 * @package App\Infra\Doctrine\Repository\Interfaces
 */
interface CommentsRepositoryInterface
{
    /**
     * CommentsRepositoryInterface constructor.
     *
     * @param \Doctrine\Common\Persistence\ManagerRegistry $registry
     */
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry);

    /**
     * @return mixed
     */
    public function getAllComments();

    /**
     * @param $trick
     *
     * @return mixed
     */
    public function getSelectedTrickComment($trick);

    /**
     * @param CommentInterface $comment
     *
     * @return mixed
     */
    public function save(CommentInterface $comment);

    /**
     * @param $comment
     *
     * @return mixed
     */
    public function deleteComment($comment);
}