<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 15:00
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;

interface VideoFactoryInterface
{
    /**
     * @param NewVideoDTOInterface $newVideoDTO
     * @return mixed
     */
    public function create(NewVideoDTOInterface $newVideoDTO);
}