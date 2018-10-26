<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:09
 */

namespace App\Form\Handler;

use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Factory\Interfaces\CommentFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use App\Form\Handler\Interfaces\CommentHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
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
     * @var TokenStorage
     */
    private $tokenStorage;

    /**
     * @inheritdoc
     */
    public function __construct(
        CommentFactoryInterface     $commentFactory,
        CommentsRepositoryInterface $commentsRepository,
        ValidatorInterface          $validator,
        TokenStorageInterface       $tokenStorage

    )
    {
        $this->commentFactory     = $commentFactory;
        $this->commentsRepository = $commentsRepository;
        $this->validator          = $validator;
        $this->tokenStorage       = $tokenStorage;
    }

    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form, TrickInterface $trick) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $comment = $this->commentFactory->create($form->getData(), $this->tokenStorage->getToken()->getUser(), $trick);

            $constraints = $this->validator->validate($comment,[],['NewCommentDTO']);

            if (\count($constraints) > 0) {
                return false;
            }

            $this->commentsRepository->save($comment);
        }

        return false;
    }
}