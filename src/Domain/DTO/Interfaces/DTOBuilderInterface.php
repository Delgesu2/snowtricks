<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 22:37
 */

namespace App\Domain\DTO\Interfaces;

use App\Domain\DTO\Security\Interfaces\UpdateUserDTOInterface;
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Entity\Interfaces\VideoInterface;

/**
 * Interface DTOBuilderInterface
 *
 * @package App\Domain\DTO\Interfaces
 */
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

    /**
     * @param UserTrickInterface $user
     *
     * @return UpdateUserDTOInterface
     */
    public function hydrateUserDTO(UserTrickInterface $user): UpdateUserDTOInterface;
}