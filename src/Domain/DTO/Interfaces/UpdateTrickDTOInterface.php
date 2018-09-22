<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 04/08/18
 * Time: 19:57
 */

namespace App\Domain\DTO\Interfaces;

/**
 * Interface UpdateTrickDTOInterface
 *
 * @package App\Domain\DTO\Interfaces
 */
interface UpdateTrickDTOInterface
{
    /**
     * UpdateTrickDTOInterface constructor.
     * @param $trick_name
     * @param $description
     * @param $trick_group
     * @param array $photo
     * @param array $video
     */
    public function __construct(
        $trick_name,
        $description,
        $trick_group,
        array $photo,
        array $video
    );
}