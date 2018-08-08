<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 22:37
 */

namespace App\Domain\DTO\Interfaces;

use App\Entity\Interfaces\PhotoInterface;
use App\Entity\Interfaces\TrickInterface;
use App\Entity\Interfaces\VideoInterface;

interface DTOBuilderInterface
{
    /**
     * @param TrickInterface $trick
     *
     * @return UpdateTrickDTOInterface
     */
    public function hydrateTrickDTO(TrickInterface $trick): UpdateTrickDTOInterface;

    /**
     * @param PhotoInterface $photo
     *
     * @return UpdatePhotoDTOInterface
     */
    public function hydratePhotoDTO(PhotoInterface $photo): UpdatePhotoDTOInterface;

    /**
     * @param VideoInterface $video
     *
     * @return UpdateVideoDTOInterface
     */
    public function hydrateVideoDTO(VideoInterface $video): UpdateVideoDTOInterface;
}