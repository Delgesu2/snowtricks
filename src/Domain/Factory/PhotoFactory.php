<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 16:28
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewPhotoDTOInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Entity\Photo;


class PhotoFactory implements PhotoFactoryInterface
{
    /**
     * @param $title
     * @param $path
     * @param $alt
     * @return Photo|mixed
     */
    public function create($title, $path, $alt)
    {
        return new Photo(
            $title,
            $path,
            $alt
        );
    }
}
