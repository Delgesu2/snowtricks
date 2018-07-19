<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 16:28
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewPhotoDTOInterface;
use App\Entity\Photo;


class PhotoFactory
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
