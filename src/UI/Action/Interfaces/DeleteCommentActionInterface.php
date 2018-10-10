<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 09/10/18
 * Time: 13:53
 */

namespace App\UI\Action\Interfaces;


use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;

interface DeleteCommentActionInterface
{
    /**
     * DeleteCommentActionInterface constructor.
     *
     * @param CommentsRepositoryInterface $commentsRepository
     * @param TricksRepositoryInterface $tricksRepository
     */
    public function __construct(
        CommentsRepositoryInterface $commentsRepository,
        TricksRepositoryInterface $tricksRepository
    );

}