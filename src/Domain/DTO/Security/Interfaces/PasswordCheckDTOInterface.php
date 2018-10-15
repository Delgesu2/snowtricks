<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 19:42
 */

namespace App\Domain\DTO\Security\Interfaces;


interface PasswordCheckDTOInterface
{
    /**
     * PasswordCheckDTOInterface constructor.
     *
     * @param string $newpassword
     * @param string $checknewpassword
     */
    public function __construct(
        string $newpassword,
        string $checknewpassword
    );
}