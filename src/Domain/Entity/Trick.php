<?php

namespace App\Domain\Entity;

use App\Domain\Entity\Interfaces\CommentInterface;
use App\Domain\Entity\Interfaces\GroupInterface;
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Entity\Interfaces\VideoInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidInterface;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;
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
    * @var array
    */
    private $video;

    /**
    * @var UserTrickInterface
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
     * Trick constructor.
     *
     * @param $trick_name
     * @param $description
     * @param $trick_group
     * @param $trick_user
     */
    public function __construct(
        $trick_name,
        $description,
        $trick_group,
        UserTrickInterface $trick_user
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
        return mb_strtolower(utf8_decode(strtr($trick_name, ' ', '-')));
    }

    /**
    * {@inheritdoc}
    */
    public function getTrickName() :string
    {
        return $this->trick_name;
    }

    /**
    * {@inheritdoc}
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
    * {@inheritdoc}
    */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
    * {@inheritdoc}
    */
    public function getVideo()
    {
        return $this->video;
    }

    /**
    * {@inheritdoc}
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
     *
     * {@inheritdoc}
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
     *
     * {@inheritdoc}
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
     *
     * {@inheritdoc}
     */
    public function addVideo(Video $video)
    {
        $this->video->add($video);
        $video->setTrickVideo($this);
    }

    public function removeVideo(Video $video)
    {
        $this->video->removeElement($video);
        $video->setTrickVideo(null);
    }


    /**
     * @param CommentInterface[] $comment
     */
    public function setComment(array $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @param PhotoInterface $photo
     */
    public function setPhoto(PhotoInterface $photo): void
    {
        $this->photo = $photo;
    }

    /**
     * @param string $trick_name
     */
    public function setTrickName(string $trick_name): void
    {
        $this->trick_name = $trick_name;
    }

    /**
     * @param GroupInterface $trick_group
     */
    public function setTrickGroup(GroupInterface $trick_group): void
    {
        $this->trick_group = $trick_group;
    }

    /**
     * @param array $video
     */
    public function setVideo(array $video): void
    {
        $this->video = $video;
    }

    /**
     * @param UserTrickInterface $trick_user
     */
    public function setTrickUser(UserTrickInterface $trick_user): void
    {
        $this->trick_user = $trick_user;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }
}
