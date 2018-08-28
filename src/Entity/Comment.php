<?php

namespace App\Entity;

use App\Entity\Interfaces\CommentInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Comment entity
*/
class Comment implements CommentInterface
{
	/**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

	/**
	* @var \DateTime
	*/
	private $date;

    /**
    * @var string
    */
    private $text;

    /**
    * @var User
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
        $this->date = time();
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
    * @return \DateTime
    */
	public function getDate() :?\DateTime
	{
		return \DateTime::createFromFormat('U', (string) $this->date) ?: null;
	}

	/**
    * @return string
    */
	public function getText() :string
	{
		return $this->text;
	}

	/**
    * @return User
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