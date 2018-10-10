<?php

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\UpdateUserDTOInterface;

/**
 * Class UpdateUserDTO
 *
 * @package App\Domain\DTO\Security
 */
final class UpdateUserDTO implements UpdateUserDTOInterface
{
    /**
     * @var string
     */
    public $name;

    public $nick;

    public $password;

    public $email;

    public $photo = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        string $name,
        $nick,
        $password,
        $email,
        $photo = null
    ) {
        $this->name = $name;
        $this->nick = $nick;
        $this->password = $password;
        $this->email = $email;
        $this->photo = $photo;
    }

}

