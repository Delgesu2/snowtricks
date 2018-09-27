<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/09/18
 * Time: 14:26
 */

namespace App\Domain\DTO\Security\Interfaces;


interface UserConnectionDTOInterface
{
    /**
     * UserConnectionDTOInterface constructor.
     *
     * @param string $name
     * @param string $password
     * @param bool $keep
     */
    public function __construct(
        string $name,
        string $password,
        bool   $keep
    );
}