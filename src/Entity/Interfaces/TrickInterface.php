<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/06/18
 * Time: 11:44
 */

namespace App\Entity\Interfaces;


interface TrickInterface
{
    /**
     * @return \DateTime|null
     */
    public function getDateCreate() :?\DateTime;

    /**
     * @return \DateTime|null
     */
    public function getDateUpdate() :?\DateTime;
}