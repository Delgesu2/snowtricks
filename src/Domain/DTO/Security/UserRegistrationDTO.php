<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:23
 */

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\UserRegistrationDTOInterface;

final class UserRegistrationDTO implements UserRegistrationDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var \SplFileInfo
     */
    public $photo = null;

    /**
     * @var string
     */
    public $nick;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $email;

    public function __construct(
        string       $name,
        \SplFileInfo $photo = null,
        string       $nick,
        string       $password,
        string       $email
    )
    {
        $this->name     = $name;
        $this->photo    = $photo;
        $this->nick     = $nick;
        $this->password = $password;
        $this->email    = $email;
    }
}