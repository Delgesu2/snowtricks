<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:23
 */

namespace App\Form\Handler\Interfaces;


use App\Domain\Factory\Interfaces\CommentFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CommentHandlerInterface
{
    /**
     * CommentHandlerInterface constructor.
     *
     * @param CommentFactoryInterface $commentFactory
     * @param CommentsRepositoryInterface $commentsRepository
     * @param ValidatorInterface $validator
     */
    public function __construct(
        CommentFactoryInterface $commentFactory,
        CommentsRepositoryInterface $commentsRepository,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form) :bool;
}