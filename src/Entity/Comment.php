<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Comment entity
*/
class Comment
{
	/**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

	/**
	* @var date
	*/
	private $date;

    /**
    * @var text
    */
    private $text;

    /**
    * @var user
    */
    private $user;
     
    /**
    * @var trick
    */
    private $trick;

    /**
     * Comment constructor
     */
    public function __construct($text, $user, $trick)
    {
        $this->id = Uuid::uuid4();
        $this->text = $text;
        $this->user = $user;
        $this->trick = $trick;
    }

    /**
    * @return UuidInterface
    */
	public function getId(): UuidInterface
	{
		return $this->id;
	}

	/**
    * @return date
    */
	public function getDate()
	{
		return $this->date;
	}

	/**
    * @return text
    */
	public function getText()
	{
		return $this->text;
	}

	/**
    * @return user
    */
	public function getUser()
	{
		return $this->user;
	}

	/**
    * @return trick
    */
	public function getTrick()
	{
		return $this->trick;
	}
 	
	/**
    * Trick update
    */
    public function update()
    {

    }
}