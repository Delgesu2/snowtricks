<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 19:55
 */

namespace App\Domain\DTO\Interfaces;

interface NewCommentDTOInterface
{
    /**
     * NewCommentDTOInterface constructor.
     * @param $text
     */
    public function __construct(
        $text
    );
}