<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 19:57
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewCommentDTOInterface;

class NewCommentDTO implements NewCommentDTOInterface
{
    /**
     * @var string
     */
    public $text;

    /**
     * NewCommentDTO constructor.
     * @param $text
     */
    public function __construct($text)
    {
        $this->text = $text;
    }
}