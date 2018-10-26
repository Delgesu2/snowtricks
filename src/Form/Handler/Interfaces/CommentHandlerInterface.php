<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/08/18
 * Time: 16:23
 */

namespace App\Form\Handler\Interfaces;

use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Factory\Interfaces\CommentFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\CommentsRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface CommentHandlerInterface
 *
 * @package App\Form\Handler\Interfaces
 */
interface CommentHandlerInterface
{
    /**
     * CommentHandlerInterface constructor.
     *
     * @param CommentFactoryInterface $commentFactory
     * @param CommentsRepositoryInterface $commentsRepository
     * @param ValidatorInterface $validator
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        CommentFactoryInterface $commentFactory,
        CommentsRepositoryInterface $commentsRepository,
        ValidatorInterface $validator,
        TokenStorageInterface $tokenStorage
    );

    /**
     * @param FormInterface $form
     * @param TrickInterface $trick
     *
     * @return bool
     */
    public function handle(
        FormInterface $form,
        TrickInterface $trick
    ) :bool;
}