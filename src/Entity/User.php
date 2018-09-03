<?php

namespace App\Entity;

use App\Entity\Interfaces\UserTrickInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Snowtricks_user entity
*/
class User implements UserTrickInterface
{
    /**
    * @var \Ramsey\Uuid\UuidInterface
    */
	private $id;

    /**
     * @var string
     */
	private $slug;

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
    public function __construct(
        $name,
        $nick,
        $password,
        $email,
        $status = null,
        $role = null,
        $photo = null,
        $trick = null,
        $comment = null
    )
    {
        $this->id = Uuid::uuid4();
        $this->name = $name;
        $this->slug = $this->createSlug($name);
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
     * @inheritdoc
     */
	public function getName() :string
	{
		return $this->name;
	}

    /**
     * @inheritdoc
     */
    public function getSlug() :string
    {
        return $this->slug;
    }

    /**
     * @param $name
     * @return mixed|null|string|string[]
     */
    private function createSlug($name)
    {
        return mb_strtolower(strtr($name, ' ', '-'), 'UTF-8');
    }

	/**
    * @inheritdoc
    */
	public function getPhoto() :string
	{
		return $this->photo;
	}

	/**
    * @inheritdoc
    */
	public function getNick() :string
	{
		return $this->nick;
	}

	/**
    * @inheritdoc
    */
	public function getPassword() :string
	{
		return $this->password;
	}

	/**
    * @inheritdoc
    */
	public function getEmail() :string
	{
		return $this->email;
	}

    /**
    * @inheritdoc
    */
    public function getTrick()
    {
    	return $this->trick;
    }


    /**
     * @inheritdoc
     */
    public function getComment() :string
    {
        return $this->comment;
    }

	/**
    * @inheritdoc
    */
	public function getStatus() :bool
	{
		return $this->status;
	}

	/**
    * @inheritdoc
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