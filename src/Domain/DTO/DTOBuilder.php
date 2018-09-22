<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 06/08/18
 * Time: 19:30
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\DTOBuilderInterface;
use App\Domain\DTO\Interfaces\UpdatePhotoDTOInterface;
use App\Domain\DTO\Interfaces\UpdateTrickDTOInterface;
use App\Domain\DTO\Interfaces\UpdateVideoDTOInterface;
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Interfaces\VideoInterface;

/**
 * Class DTOBuilder
 *
 * @package App\Domain\DTO
 */
final class DTOBuilder implements DTOBuilderInterface
{
    /**
     * {@inheritdoc}
     */
    public function hydrateTrickDTO(TrickInterface $trick): UpdateTrickDTOInterface
    {
        return new UpdateTrickDTO(
            $trick->getTrick_name(),
            $trick->getDescription(),
            $trick->getTrick_group(),
            $trick->getPhoto()->toArray(),
            $trick->getVideo()->toArray()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function hydratePhotoDTO(PhotoInterface $photo): UpdatePhotoDTOInterface
    {
        return new UpdatePhotoDTO(
            $photo->getTitle(),
            $photo->getPath(),
            $photo->getAlt()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function hydrateVideoDTO(VideoInterface $video): UpdateVideoDTOInterface
    {
        return new UpdateVideoDTO($video->getUrl());
    }
}
