<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 16:48
 */

namespace App\Domain\DTO\Interfaces;

/**
 * Interface NewTrickDTOInterface
 *
 * @package App\Domain\DTO\Interfaces
 */
interface NewTrickDTOInterface
{
    /**
     * NewTrickDTOInterface constructor.
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