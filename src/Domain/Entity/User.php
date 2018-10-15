<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\PhotoInterface;
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
     * @var PhotoInterface
     */
    private $photo;

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
     * User constructor.
     *
     * @param string $name
     * @param string $nick
     * @param string $password
     * @param string $email
     * @param null $photo
     * @param null $trick
     * @param null $comment
     * @param null $valid
     * @param null $role
     */
    public function __construct(
        string $name = null,
        string $nick = null,
        string $password = null,
        string $email = null,
        $photo  = null,
        $trick  = null,
        $comment= null,
        $valid  = null,
        $role   = null
    )
    {
        $this->id       = Uuid::uuid4();
        $this->name     = $name;
        $this->slug     = $this->createSlug($name);
        $this->nick     = $nick;
        $this->password = $password;
        $this->email    = $email;
        $this->photo    = $photo;
        $this->comment  = $comment;
        $this->valid    = $valid;
        $this->role     = $role;
        $this->token    = md5(uniqid(rand(), false));
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
	public function getPhoto() :? PhotoInterface
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
    * {@inheritdoc}
    */
    public function validate() :void
    {
        $this->valid = true;
        $this->validationDate = new \DateTimeImmutable();
        $this->role = ['ROLE_USER'];
    }

    /**
     * {@inheritdoc}
     */
    public function addPhoto($photo = null)
    {
        $this->photo = $photo;
        $this->photo->setUserPhoto($this);
    }

    /**
    * {@inheritdoc}
    */
    public function update(
        $nick,
        $password,
        $email,
        $photo
    )
    {
        $this->nick = $nick;
        $this->password = $password;
        $this->email = $email;
        $this->photo = $photo;
    }

    public function changePassword($password)
    {
        $this->password = $password;
    }


    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        //return ['ROLE_ADMIN'];
        return $this->role;
    }

    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->name;
    }


    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }

    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }

    /**
     * {@inheritdoc}
     */
    public function isEnabled()
    {
        return $this->valid;
    }

    /**
     * {@inheritdoc}
     */
    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->name,
            $this->password,
            $this->valid
        ));
    }

    /**
     * {@inheritdoc}
     */
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