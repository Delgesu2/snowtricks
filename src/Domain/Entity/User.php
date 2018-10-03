<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
* Snowtricks_user entity
*/
class User implements UserTrickInterface, UserInterface, \Serializable
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
    * @var Photo
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
	private $valid;

    /**
     * @var string
     */
	private $token;

	/**
	* role (array)
	*/
	private $role;

    /**
     * @var \DateTimeInterface|null
     */
	private $validationDate = null;

    /**
     * User constructor
     */
    public function __construct(
        $name,
        $nick,
        $password,
        $email,
        $role   = null,
        $valid  = null,
        $photo  = null,
        $trick  = null,
        $comment= null
    )
    {
        $this->id       = Uuid::uuid4();
        $this->name     = $name;
        $this->slug     = $this->createSlug($name);
        $this->nick     = $nick;
        $this->password = $password;
        $this->email    = $email;
        $this->role     = $role;
        $this->token    = md5(uniqid(rand(), false));
        $this->valid    = $valid;
        $this->photo    = $photo;
        $this->comment  = $comment;
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
    public function getValid() :bool
    {
        return $this->valid;
    }

    /**
     * @inheritdoc
     */
    public function getToken(): string
    {
        return $this->token;
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
	public function getRole() :string
	{
		return $this->role;
	}

    /**
    * @inheritdoc
    */
    public function validate() :void
    {
        $this->valid = true;
        $this->validationDate = new \DateTimeImmutable();
        $this->role = ['ROLE_USER'];
    }

    /**
    * User update
    */
    public function update()
    {
    	
    }

    public function getRoles()
    {
        //return ['ROLE_ADMIN'];
        return $this->role;
    }

    public function getUsername()
    {
        return $this->name;
    }


    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }


    public function isEnabled()
    {
        return $this->valid;
    }

    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->name,
            $this->password,
            $this->valid
        ));
    }

    public function unserialize($serialized)
    {
        list(
            $this->id,
            $this->name,
            $this->password,
            $this->valid
            ) = unserialize($serialized);
    }

}