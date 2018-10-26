<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 20:01
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewCommentDTOInterface;
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Factory\Interfaces\CommentFactoryInterface;
use App\Domain\Entity\Comment;

/**
 * Class CommentFactory
 *
 * @package App\Domain\Factory
 */
final class CommentFactory implements CommentFactoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function create(
        NewCommentDTOInterface $commentDTO,
        UserTrickInterface     $user,
        TrickInterface         $trick
)
    {
        return new Comment(
            $commentDTO->text,
            $user,
            $trick
        );
    }
}
