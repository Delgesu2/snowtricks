<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\CommentInterface;
use App\Domain\Entity\User;
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
     * @var string
     */
	private $slug;

	/**
	* @var \DateTime
	*/
	private $date;

    /**
    * @var string
    */
    private $text;

    /**
    * @var \App\Domain\Entity\User
    */
    private $user;
     
    /**
    * @var trick
    */
    private $trick;

    /**
     * Comment constructor.
     *
     * @param $text
     * @param $user
     * @param $trick
     */
    public function __construct(
        $text,
        $user,
        $trick
    )
    {
        $this->id = Uuid::uuid4();
        $this->slug = $this->createSlug($text);
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
     * {@inheritdoc}
     */
    public function getSlug() :string
    {
        return $this->slug;
    }

    /**
     * @param $text
     *
     * @return mixed|null|string|string[]
     */
    private function createSlug($text)
    {
        $short = substr($text, 0, 20);

        return mb_strtolower(utf8_decode(strtr($short, ' ', '-')));
    }

	/**
    * {@inheritdoc}
    */
	public function getDate() :?\DateTime
	{
		return \DateTime::createFromFormat('U', (string) $this->date) ?: null;
	}

	/**
    * {@inheritdoc}
    */
	public function getText() :string
	{
		return $this->text;
	}

	/**
    * {@inheritdoc}
    */
	public function getUser()
	{
		return $this->user;
	}

	/**
    * {@inheritdoc}
    */
	public function getTrick()
	{
		return $this->trick;
	}

}