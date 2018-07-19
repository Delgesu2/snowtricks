<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 18:48
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;
use App\Entity\Video;

class VideoFactory
{
    /**
     * @param NewVideoDTOInterface $newVideoDTO
     * @return Video
     */
    public function create(NewVideoDTOInterface $newVideoDTO)
    {
        return new Video(
            $newVideoDTO->title,
            $newVideoDTO->url
        );
    }
}