<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 09/10/18
 * Time: 13:53
 */

namespace App\UI\Action\Interfaces;


use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use App\UI\Responder\Interfaces\DeleteCommentResponderInterface;
use Symfony\Component\HttpFoundation\Request;

interface DeleteCommentActionInterface
{
    /**
     * DeleteCommentActionInterface constructor.
     *
     * @param CommentsRepositoryInterface $commentsRepository
     */
    public function __construct(
        CommentsRepositoryInterface $commentsRepository
    );

    /**
     * @param DeleteCommentResponderInterface $responder
     * @param Request $request
     *
     * @return mixed
     */
    public function __invoke(
        DeleteCommentResponderInterface $responder,
        Request                         $request
    );

}