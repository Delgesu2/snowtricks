<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 17/07/18
 * Time: 11:32
 */

namespace App\Domain\Factory;

use App\Domain\DTO\Interfaces\NewTrickDTOInterface;
use App\Domain\Factory\Interfaces\TrickFactoryInterface;
use App\Domain\Entity\Trick;
use App\Domain\Entity\Interfaces\UserTrickInterface;

/**
 * Class TrickFactory
 *
 * @package App\Domain\Factory
 */
final class TrickFactory implements TrickFactoryInterface
{
    /**
     * @param NewTrickDTOInterface $newTrickDTO.
     *
     * @return Trick
     */
    public function create(
        NewTrickDTOInterface $newTrickDTO,
        UserTrickInterface   $userTrick
    )
    {
        return new Trick(
            $newTrickDTO->trick_name,
            $newTrickDTO->description,
            $newTrickDTO->trick_group,
            $userTrick,
            $newTrickDTO->photo,
            $newTrickDTO->video
            );
    }
}
