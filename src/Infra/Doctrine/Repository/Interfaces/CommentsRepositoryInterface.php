<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:21
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

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


}