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
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Photo;


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

    /**
     * {@inheritdoc}
     */
    public function createFromFile(\SplFileInfo $file): PhotoInterface
    {
        return new Photo(
            'file',
            md5(str_rot13($file->getBasename('.'.$file->getExtension()))).'.'.$file->getExtension(),
            'Photo_profile'
        );
    }

}
