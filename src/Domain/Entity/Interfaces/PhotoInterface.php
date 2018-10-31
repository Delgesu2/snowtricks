<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:11
 */

namespace App\Domain\Entity\Interfaces;

use App\Domain\Entity\Trick;
use App\Domain\Entity\User;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface PhotoInterface
 *
 * @package App\Domain\Entity\Interfaces
 */
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
    public function getPath() :? string;

    /**
     * @return mixed
     */
    public function getTrickPhoto();

    /**
     * @return string
     */
    public function getAlt() :string;

    /**
     * @param $title
     * @param $path
     * @param $alt
     *
     * @return mixed
     */
    public function update($title, $path, $alt);

    /**
     * @param Trick $trick_photo
     */
    public function setTrickPhoto(Trick $trick_photo): void;

    /**
     * @param User $user_photo
     */
    public function setUserPhoto(User $user_photo): void;

    /**
     * @param string $path
     *
     * @return mixed
     */
    public function upload(string $path);
}