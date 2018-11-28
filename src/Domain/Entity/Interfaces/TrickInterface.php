<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/06/18
 * Time: 11:44
 */

namespace App\Domain\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;

/**
 * Interface TrickInterface
 *
 * @package App\Domain\Entity\Interfaces
 */
interface TrickInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() :UuidInterface;

    /**
     * @return string
     */
    public function getTrick_name() :string;

    /**
     * @return string
     */
    public function getDescription() :string;

    /**
     * @return GroupInterface
     *
     */
    public function getTrick_group() :GroupInterface;

    /**
     * @return CommentInterface[]
     */
    public function getComment() :\ArrayAccess;

    /**
     * @return PhotoInterface
     */
    public function getPhoto();

    /**
     * @return VideoInterface
     */
    public function getVideo();

    /**
     * @return string
     */
    public function getTrick_user() :string;

    /**
     * @return \DateTime|null
     */
    public function getDateCreate() :?\DateTime;

    /**
     * @return \DateTime|null
     */
    public function getDateUpdate() :?\DateTime;

    /**
     * @return mixed
     */
    public function getRandPhoto();

    /**
     * @param array $photos
     *
     * @return mixed
     */
    public function addPhoto(array $photos);

    /**
     * @param array $videos
     *
     * @return mixed
     */
   // public function addVideo(array $videos);

    //public function removeVideo(Video $video);

    //public function setComment(array $comment): void;

   // public function setPhoto(PhotoInterface $photo): void;

    //public function setTrickName(string $trick_name): void;





}

