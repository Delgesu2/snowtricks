<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 13:51
 */

namespace App\Domain\Factory\Interfaces;


use App\Domain\DTO\Interfaces\NewPhotoDTOInterface;

interface PhotoFactoryInterface
{
    /**
     * @param NewPhotoDTOInterface $newPhotoDTO
     * @return mixed
     */
    public function create(NewPhotoDTOInterface $newPhotoDTO);
}