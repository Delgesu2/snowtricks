<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
* Trick entity
*/
class Trick
{
    /**
    * @var \Ramsey\Uuid\UuidInterface
    */
    private $id;

    /**
    * @var string
    */
    private $trick_name;

    /**
    * @var string
    */
    private $description;

    /**
    * @var Group
    */
    private $trick_group;

    /**
     * @var Comment
     *
     */
    private $comment;

    /**
    * @var Photo
    */
    private $photo;

    /**
    * @var Video
    */
    private $video;

    /**
    * @var User
    */
    private $trick_user;

    /**
    * @var DateTime
    */
    private $datecreate;

    /**
    * @var DateTime
    */
    private $dateupdate;

    /**
     * Trick constructor
     */
    public function __construct(
        $trick_name,
        $description,
        $trick_group,
        $trick_user,
        $photo = null,
        $video = null,
        $comment = null
    ) {
        $this->id = Uuid::uuid4();
        $this->trick_name = $trick_name;
        $this->description = $description;
        $this->trick_group = $trick_group;
        $this->trick_user = $trick_user;
        $this->photo = new ArrayCollection();
        $this->video = new ArrayCollection();
        $this->comment = $comment;
        $this->datecreate = time();
        $this->addPhoto($photo ?? array());
    }

    /**
    * @return \Ramsey\Uuid\UuidInterface
    */
    public function getId(): UuidInterface
    {
        $this->id = Uuid::uuid4();
    }

    /**
    * @return string
    */
    public function getTrick_name()
    {
        return $this->trick_name;
    }

    /**
    * @return string
    */
    public function getDescription()
    {
        return $this->description;
    }

    /**
    * @return string
    */
    public function getTrick_group()
    {
        return $this->trick_group;
    }

    /**
     * @return Comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
    * @return photo
    */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
    * @return video
    */
    public function getVideo()
    {
        return $this->video;
    }

    /**
    * @return string
    */
    public function getTrick_user()
    {
        return $this->trick_user;
    }

    /**
    * @return DateTime
    */
    public function getDatecreate()
    {
        return $this->datecreate = time();
    }

    /**
    * @return DateTime
    */
    public function getDateupdate()
    {
        return $this->dateupdate = time();
    }

    /**
    * Trick update
    */
    public function update()
    {

    }

    /**
     * Get random photo for 1 trick (homepage)
     */
    public function getRandPhoto()
    {
        return array_rand((array)$this->photo, 1);
    }

    /**
     * Add photo
     */
    public function addPhoto(array $photos)
    {
        foreach ($photos as $photo) {
            if (\count($photos) <= 0) { break; }

            $this->photo[] = $photo;
            $photo->setTrickPhoto($this);
        }
    }
}