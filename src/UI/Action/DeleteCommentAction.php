<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 30/10/18
 * Time: 14:55
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use App\UI\Action\Interfaces\DeleteCommentActionInterface;
use App\UI\Responder\Interfaces\DeleteCommentResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DeleteCommentAction
 *
 * @Route(name="delete_comment",
 *     path="/delcom/{slug}/{trick}",
 *     requirements={"slug"="[a-zA-Z0-9?;!.,'-]+"}
 *     )
 */
final class DeleteCommentAction implements DeleteCommentActionInterface
{
    /**
     * @var CommentsRepositoryInterface
     */
    private $repository;

    /**
     * {@inheritdoc}
     */
    public function __construct(CommentsRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        DeleteCommentResponderInterface $responder,
        Request                         $request
    )
    {
        $this->repository->deleteComment($request->get('slug'));

        return $responder($request);
    }

}