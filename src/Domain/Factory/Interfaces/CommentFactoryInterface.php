<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 12:48
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\DTO\Interfaces\NewCommentDTOInterface;

/**
 * Interface CommentFactoryInterface
 *
 * @package App\Domain\Factory\Interfaces
 */
interface CommentFactoryInterface
{
    /**
     * @param NewCommentDTOInterface $commentDTO
     * @return mixed
     */
    public function create(NewCommentDTOInterface $commentDTO);
}