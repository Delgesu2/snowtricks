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
     * @return \DateTime|null
     */
    public function getDateCreate() :?\DateTime;

    /**
     * @return \DateTime|null
     */
    public function getDateUpdate() :?\DateTime;

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
     * @return mixed
     */
    public function getPhoto();

    /**
     * @return mixed
     */
    public function getVideo();

    /**
     * @return string
     */
    public function getTrick_user() :string;

    /**
     * @param $name
     * @param $description
     * @param $group
     * @param $photo
     * @param $video
     *
     * @return mixed
     */
    public function update(
        $name,
        $description,
        $group,
        $photo,
        $video
    );
}

