<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:11
 */

namespace App\Domain\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;

/**
 * Interface CommentInterface
 *
 * @package App\Domain\Entity\Interfaces
 */
interface CommentInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() :UuidInterface;

    /**
     * @return \DateTime|null
     */
    public function getDate() :?\DateTime;

    /**
     * @return string
     */
    public function getText() :string;

    /**
     * @return mixed
     */
    public function getUser();

    /**
     * @return mixed
     */
    public function getTrick();

}