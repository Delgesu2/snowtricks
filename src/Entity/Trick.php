<?php

namespace App\Entity;

use App\Entity\Interfaces\TrickInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Validator\Constraints\DateTime;

/**
* Trick entity
*/
class Trick implements TrickInterface
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
    private $datecreate = null;

    /**
    * @var DateTime
    */
    private $dateupdate = null;

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
        $this->slug = $this->createSlug($trick_name);
        $this->description = $description;
        $this->trick_group = $trick_group;
        $this->trick_user = $trick_user;
        $this->photo = new ArrayCollection();
        $this->video = new ArrayCollection();
        $this->comment = new ArrayCollection();
        $this->datecreate = time();
        $this->addPhoto($photo ?? array());
        $this->addVideo($video ?? array());
    }

    /**
    * @return \Ramsey\Uuid\UuidInterface
    */
    public function getId(): UuidInterface
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSlug() :string
    {
        return $this->slug;
    }

    /**
     * @param $trick_name
     * @return mixed|null|string|string[]
     */
    private function createSlug($trick_name)
    {
        return mb_strtolower(strtr($trick_name, ' ', '-'), 'UTF-8');
    }

    /**
    * @return string
    */
    public function getTrick_name() :string
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
     * {@inheritdoc}
     */
    public function getDateCreate() :?\DateTime
    {
        return \DateTime::createFromFormat('U', (string)$this->datecreate) ?: null;
    }

    /**
     * {@inheritdoc}
     */
    public function getDateUpdate() :?\DateTime
    {
        return \DateTime::createFromFormat('U', (string) $this->dateupdate) ?: null;
    }

    /**
     * Get random photo for 1 trick (homepage)
     */
    public function getRandPhoto()
    {
        if (empty($this->photo->toArray())) {
            return;
        }

        return $this->photo->toArray()[array_rand($this->photo->toArray())];
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

    /**
     * Add video
     */
    public function addVideo(array $videos)
    {
        foreach ($videos as $video) {
            if (\count($videos) <= 0) { break; }

            $this->video[] = $video;
            $video->setTrickVideo($this);
        }
    }
}
