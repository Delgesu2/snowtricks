<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Snowtricks_user entity
*/
class User
{
    /**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

	/**
    * @var string
    */
	private $name;

	/**
    * @var photo
    */
	private $photo;

	/**
    * @var nick
    */
	private $nick;

	/**
    * @var password
    */
	private $password;

	/**
    * @var email
    */
	private $email;

	/**
	* @var trick
	*/
	private $trick;

    /**
     * @var comment
     */
	private $comment;

	/**
	* boolean
	*/
	private $status;

	/**
	* role (array)
	*/
	private $role;

    /**
     * User constructor
     */
    public function __construct($name, $nick, $password, $email, $status, $role, $photo = null, $trick = null, $comment = null)
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->nick = $nick;
        $this->password = $password;
        $this->email = $email;
        $this->status = $status;
        $this->role = $role;
        $this->photo = $photo;
        $this->comment = $comment;
    }

	/**
    * @return UuidInterface
    */
	public function getId(): UuidInterface
	{
		return $this->id;
	}

	/**
    * @return name
    */
	public function getName()
	{
		return $this->name;
	}

	/**
    * @return photo
    */
	public function getPhoto()
	{
		return $this->photo;
	}

	/**
    * @return nick
    */
	public function getNick()
	{
		return $this->nick;
	}

	/**
    * @return photo
    */
	public function getPassword()
	{
		return $this->photo;
	}

	/**
    * @return email
    */
	public function getEmail()
	{
		return $this->email;
	}

    /**
    * @return trick
    */
    public function getTrick()
    {
    	return $this->trick;
    }


    /**
     * @return comment
     */
    public function getComment()
    {
        return $this->comment;
    }

	/**
    * @return status
    */
	public function getStatus()
	{
		return $this->status;
	}

	/**
    * @return role
    */
	public function getRole()
	{
		return $this->role;
	}

    /**
    * User validate
    */
    public function validate()
    {

    }

    /**
    * User update
    */
    public function update()
    {
    	
    }
}