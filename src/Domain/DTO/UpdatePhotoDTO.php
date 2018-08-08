<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 19:42
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\UpdatePhotoDTOInterface;

class UpdatePhotoDTO implements UpdatePhotoDTOInterface
{
    /**
     * @var string
     */
    public $title;

    public $path;

    public $alt;

    /**
     * @inheritdoc
     */
    public function __construct(
        $title,
        $path,
        $alt
    )
    {
        $this->title = $title;
        $this->path  = $path;
        $this->alt   = $alt;
    }
}