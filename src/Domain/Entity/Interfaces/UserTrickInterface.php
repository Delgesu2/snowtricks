<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:12
 */

namespace App\Domain\Entity\Interfaces;

use Ramsey\Uuid\UuidInterface;

/**
 * Interface UserTrickInterface
 *
 * @package App\Domain\Entity\Interfaces
 */
interface UserTrickInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() :UuidInterface;

    /**
     * @return string
     */
    public function getName() :string;

    /**
     * @return string
     */
    public function getSlug() :string;

    /**
     * @return mixed
     */
    public function getPhoto();

    /**
     * @return string
     */
    public function getNick() :string;

    /**
     * @return string
     */
    public function getPassword() :string;

    /**
     * @return string
     */
    public function getEmail() :string;

    /**
     * @return bool
     */
    public function getValid() :bool;

    /**
     * @return string
     */
    public function getToken() :string;

    /**
     * @return mixed
     */
    public function getTrick();

    /**
     * @return string
     */
    public function getComment() :string;


    /**
     * @return string
     */
    public function getRole() :string;

    /**
     * @return bool
     */
    public function validate() :void;

    /**
     * @param $nick
     * @param $password
     * @param $email
     * @param $photo
     *
     * @return mixed
     */
    public function update(
        $nick,
        $password,
        $email,
        $photo
    );
}