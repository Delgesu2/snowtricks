<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/10/18
 * Time: 23:55
 */

namespace App\Domain\DTO\Security\Interfaces;


interface EmailCheckDTOInterface
{
    /**
     * EmailCheckDTOInterface constructor.
     *
     * @param $email
     */
    public function __construct($email);
}