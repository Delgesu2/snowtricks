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
     * @param NewPhotoDTOInterface $newPhotoDTO
     * @return Photo
     */
    public function create(NewPhotoDTOInterface $newPhotoDTO)
    {
        return new Photo(
            $newPhotoDTO->title,
            $newPhotoDTO->path,
            $newPhotoDTO->alt
        );
    }
}
