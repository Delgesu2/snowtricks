<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\GroupInterface;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;

/**
* Snowtricks_group
*/
class Group implements GroupInterface
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
     * @var string
     */
	private $trick;

    /**
     * Group constructor
     */
    public function __construct($name, $trick = null)
	{
		$this->id = Uuid::uuid4();
		$this->name = $name;
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
    * @return string
    */
	public function getName() :string
	{
		return $this->name;
	}

    /**
     * @return string
     */
    public function getTrick() :string
    {
        return $this->trick;
    }

	/**
	* Group update
	*/
	public function update()
	{
		
	}
}