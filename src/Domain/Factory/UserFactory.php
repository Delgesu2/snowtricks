<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 29/08/18
 * Time: 21:35
 */

namespace App\Domain\Factory;


use App\Domain\DTO\Security\Interfaces\UserRegistrationDTOInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Entity\User;

class UserFactory implements UserFactoryInterface
{
    public function create(UserRegistrationDTOInterface $userRegistrationDTO)
    {
        return new User(
            $userRegistrationDTO->name,
            $userRegistrationDTO->nick,
            $userRegistrationDTO->password,
            $userRegistrationDTO->email,
            $userRegistrationDTO->photo
        );
    }
}