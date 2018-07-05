<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/06/18
 * Time: 11:44
 */

namespace App\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;

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
     * @return string
     */
    public function getTrick_group() :string;

    /**
     * @return string
     */
    public function getComment() :string;

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
}