<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 29/08/18
 * Time: 21:37
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\DTO\Security\Interfaces\UserRegistrationDTOInterface;

interface UserFactoryInterface
{
    /**
     * @param UserRegistrationDTOInterface $userRegistrationDTO
     *
     * @return mixed
     */
    public function create(UserRegistrationDTOInterface $userRegistrationDTO);
}