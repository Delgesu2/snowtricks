<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 16/06/18
 * Time: 23:06
 */

namespace App\Domain\DTO;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class NewTrickDTO
{
    /**
     * @var string
     */
    public $trick_name;

    public $description;

    public $trick_group;

    /**
     * @var ArrayCollection
     */
    public $photo;

    /**
     * @var ArrayCollection
     */
    public $video;

    /**
     * NewTrickDTO constructor.
     * @param $trick_name
     * @param $description
     * @param array $photo
     * @param array $video
     */
    public function __construct(
        $trick_name,
        $description,
        array $photo,
        array $video
    )
    {
        $this->trick_name = $trick_name;
        $this->description = $description;
        $this->trick_name = $trick_name;
        $this->photo = $photo;
        $this->video = $video;
    }
}
