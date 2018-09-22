<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 20:01
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewCommentDTOInterface;
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
     * @param NewCommentDTOInterface $commentDTO
     * @return Comment
     */
    public function create(NewCommentDTOInterface $commentDTO)
    {
        return new Comment(
            $commentDTO->text,
            $commentDTO->user,
            $commentDTO->trick
        );
    }
}
