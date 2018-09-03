<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:24
 */

namespace App\Domain\DTO\Security\Interfaces;


interface UserRegistrationDTOInterface
{
    public function __construct(
        string       $name,
        string       $nick,
        string       $password,
        string       $email,
        \SplFileInfo $photo = null
    );
}