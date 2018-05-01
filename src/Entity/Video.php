<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

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
    public function getTrickVideo()
    {
        return $this->trick_video;
    }

    /**
     * Video constructor.
     */
	function __construct()
	{
		$this->id = Uuid::uuid4();		
	}

	/**
    * Video update
    */
	public function update()
	{

	}
	
}