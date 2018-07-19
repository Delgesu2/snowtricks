<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 17:24
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\NewPhotoDTOInterface;

class NewPhotoDTO implements NewPhotoDTOInterface
{
    /**
     * @var string
     */
    public $title;

    public $path;

    public $alt;

    /**
     * NewPhotoDTO constructor.
     * @param $title
     * @param $path
     * @param $alt
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