<?php

namespace App\Entity;

use App\Entity\Interfaces\VideoInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Video entity
*/
class Video implements VideoInterface
{
	/**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

	/**
    * @var string
    */
	private $url;

    /**
     * @var $trick_video
     */
	private $trick_video;

    /**
     * Video constructor.
     */
    function __construct($url, $trick_video = null)
    {
        $this->id = Uuid::uuid4();
        $this->url = $url;
        $this->trick_video = $trick_video;
    }

    /**
     * @return UuidInterface
     */
	public function getId(): UuidInterface
	{
		return $this->id;
	}

    /**
     * @return string
     */
	public function getUrl() :string
	{
		return $this->url;
	}

    /**
     * @return mixed
     */
    public function getTrickVideo(): ?Trick
    {
        return $this->trick_video;
    }

	/**
    * Video update
    */
	public function update()
	{

	}

    /**
     * @param Trick $trick_video
     */
    public function setTrickVideo(Trick $trick_video): void
    {
        $this->trick_video = $trick_video;
    }
}