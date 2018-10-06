<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\CommentInterface;
use App\Domain\Entity\Interfaces\GroupInterface;
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Interfaces\VideoInterface;
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
    * @var GroupInterface
    */
    private $trick_group;

    /**
     * @var CommentInterface[]
     */
    private $comment;

    /**
    * @var PhotoInterface
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
        $trick_user
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
    public function getDescription() :string
    {
        return $this->description;
    }

    /**
     * {@inheritdoc}
     */
    public function getTrick_group() :GroupInterface
    {
        return $this->trick_group;
    }

    /**
     * {@inheritdoc}
     */
    public function getComment() :\ArrayAccess
    {
        return $this->comment;
    }

    /**
    * @return PhotoInterface
    */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
    * @return VideoInterface
    */
    public function getVideo()
    {
        return $this->video;
    }

    /**
    * @return string
    */
    public function getTrick_user() :string
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
            $this->photo->setTrickPhoto($this);
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

    /**
     * {@inheritdoc}
     */
    public function update(
        $name,
        $description,
        $group,
        $photo,
        $video
    )
    {
        $this->trick_name = $name;
        $this->description = $description;
        $this->group = $group;
        $this->photo = $photo;
        $this->video = $video;
    }
}
