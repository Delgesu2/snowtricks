<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/06/18
 * Time: 20:12
 */

namespace App\Domain\Entity\Interfaces;


use Ramsey\Uuid\UuidInterface;

interface GroupInterface
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
    public function getTrick() :string;
}