<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:12
 */

namespace App\Domain\Entity\Interfaces;

use App\Domain\Entity\Trick;
use Ramsey\Uuid\UuidInterface;

/**
 * Interface VideoInterface
 *
 * @package App\Domain\Entity\Interfaces
 */
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

    /**
     * @param $url
     *
     * @return mixed
     */
    public function update($url);
}