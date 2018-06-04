<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Video entity
*/
class Video
{
	/**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

	/**
    * @var string
    */
	private $title;

	/**
    * @var string
    */
	private $path;

    /**
     * @var $trick_video
     */
	private $trick_video;

    /**
     * Video constructor.
     */
    function __construct($title, $path, $trick_video = null)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->path = $path;
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
	public function getTitle()
	{
		return $this->title;
	}

    /**
     * @return string
     */
	public function getPath()
	{
		return $this->path;
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