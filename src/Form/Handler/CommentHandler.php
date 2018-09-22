<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:09
 */

namespace App\Form\Handler;

use App\Domain\Factory\Interfaces\CommentFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use App\Form\Handler\Interfaces\CommentHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CommentHandler
 *
 * @package App\Form\Handler
 */
final class CommentHandler implements CommentHandlerInterface
{
    /**
     * @var CommentFactoryInterface
     */
    private $commentFactory;

    /**
     * @var CommentsRepositoryInterface
     */
    private $commentsRepository;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @inheritdoc
     */
    public function __construct(
        CommentFactoryInterface     $commentFactory,
        CommentsRepositoryInterface $commentsRepository,
        ValidatorInterface          $validator
    )
    {
        $this->commentFactory     = $commentFactory;
        $this->commentsRepository = $commentsRepository;
        $this->validator          = $validator;
    }

    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $comment = $this->commentFactory->create($form->getData());

            $this->commentsRepository->save($comment);
        }
    }
}