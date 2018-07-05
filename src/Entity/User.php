<?php

namespace App\Entity;

use App\Entity\Interfaces\UserInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Snowtricks_user entity
*/
class User implements UserInterface
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
    * @var string
    */
	private $nick;

	/**
    * @var string
    */
	private $password;

	/**
    * @var string
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
     * @return string
     */
	public function getName() :string
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
    * @return string
    */
	public function getNick() :string
	{
		return $this->nick;
	}

	/**
    * @return string
    */
	public function getPassword() :string
	{
		return $this->password;
	}

	/**
    * @return string
    */
	public function getEmail() :string
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
     * @return string
     */
    public function getComment() :string
    {
        return $this->comment;
    }

	/**
    * @return boolean
    */
	public function getStatus() :bool
	{
		return $this->status;
	}

	/**
    * @return string
    */
	public function getRole() :string
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