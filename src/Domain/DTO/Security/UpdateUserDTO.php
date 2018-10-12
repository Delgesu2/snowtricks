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

    /**
     * @var string
     */
    public $nick;

    /**
     * @var string
     *
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    /**
     * @var \SplFileInfo
     */
    public $photo = null;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        $name,
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

