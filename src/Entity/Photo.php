<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Photo entity
*/
class Photo
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
     * @var Trick
     */
	private $trick_photo;

    /**
     * @var string
     */
	private $alt;

    /**
     * Photo constructor.
     */
    public function __construct($title, $path, $alt, $trick_photo = null)
    {
        $this->id = Uuid::uuid4();
        $this->title = $title;
        $this->path = $path;
        $this->trick_photo = $trick_photo;
        $this->alt = $alt;
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
     * @return Trick|null
     */
    public function getTrickPhoto(): ?Trick
    {
        return $this->trick_photo;
    }

    /**
     * @return string
     */
    public function getAlt()
    {
        return $this->alt;
    }

    /**
    * Photo update
    */
	public function update()
	{

	}

    /**
     * @param Trick $trick_photo
     */
    public function setTrickPhoto(Trick $trick_photo): void
    {
        $this->trick_photo = $trick_photo;
    }
}