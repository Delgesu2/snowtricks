<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 18:48
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewVideoDTOInterface;
use App\Domain\Factory\Interfaces\VideoFactoryInterface;
use App\Entity\Video;

class VideoFactory implements VideoFactoryInterface
{

    /**
     * @param $url
     * @return Video|mixed
     */
    public function create($url)
    {
        return new Video(
            $url
        );
    }
}