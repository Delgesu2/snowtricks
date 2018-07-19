<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 19:57
 */

namespace App\Domain\DTO\Interfaces;


class NewCommentDTO implements NewCommentDTOInterface
{
    /**
     * @var string
     */
    public $text;

    public function __construct($text)
    {
        $this->text = $text;
    }
}