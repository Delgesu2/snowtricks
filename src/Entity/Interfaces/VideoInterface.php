<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:12
 */

namespace App\Entity\Interfaces;


use App\Entity\Trick;
use Ramsey\Uuid\UuidInterface;

interface VideoInterface
{
    /**
     * @return UuidInterface
     */
    public function getId() :UuidInterface;

    /**
     * @return string
     */
    public function getUrl() :string;

    /**
     * @return Trick|null
     */
    public function getTrickVideo() :?Trick;
}