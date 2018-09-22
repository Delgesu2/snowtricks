<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 19:57
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewCommentDTOInterface;

/**
 * Class NewCommentDTO
 *
 * @package App\Domain\DTO
 */
final class NewCommentDTO implements NewCommentDTOInterface
{
    /**
     * @var string
     */
    public $text;

    /**
     * {@inheritdoc}
     */
    public function __construct($text)
    {
        $this->text = $text;
    }
}