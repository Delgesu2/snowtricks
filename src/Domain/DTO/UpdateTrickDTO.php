<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 04/08/18
 * Time: 19:55
 */

namespace App\Domain\DTO;

use App\Domain\DTO\Interfaces\UpdateTrickDTOInterface;

class UpdateTrickDTO implements UpdateTrickDTOInterface
{
    /**
     * @var string
     */
    public $trick_name;

    public $description;

    public $trick_group;

    /**
     * @var array
     */
    public $photo;

    /**
     * @var array
     */
    public $video;

    /**
     * @inheritdoc
     */
    public function __construct(
        $trick_name,
        $description,
        $trick_group,
        array $photo,
        array $video
    )
    {
        $this->trick_name = $trick_name;
        $this->description = $description;
        $this->trick_group = $trick_group;
        $this->photo = $photo;
        $this->video = $video;
    }
}
