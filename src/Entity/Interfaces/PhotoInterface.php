<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:11
 */

namespace App\Entity\Interfaces;


use Ramsey\Uuid\UuidInterface;

interface PhotoInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() :UuidInterface;

    /**
     * @return string
     */
    public function getTitle() :string;

    /**
     * @return string
     */
    public function getPath() :string;

    /**
     * @return mixed
     */
    public function getTrickPhoto();

    /**
     * @return string
     */
    public function getAlt() :string;
}