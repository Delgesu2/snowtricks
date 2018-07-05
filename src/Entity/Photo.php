<?php

namespace App\Entity;

use App\Entity\Interfaces\PhotoInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Photo entity
*/
class Photo implements PhotoInterface
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
        $this->alt = $alt;
        $this->trick_photo = $trick_photo;
    }

    /**
     * @return \Ramsey\Uuid\UuidInterface
     */
	public function getId(): UuidInterface
	{
		return $this->id;
	}

    /**
     * @return string
     */
	public function getTitle() :string
	{
		return $this->title;
	}

    /**
     * @return string
     */
	public function getPath() :string
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
    public function getAlt() :string
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