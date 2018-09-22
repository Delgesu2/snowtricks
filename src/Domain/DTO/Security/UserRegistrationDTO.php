<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:23
 */

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\UserRegistrationDTOInterface;

/**
 * Class UserRegistrationDTO
 *
 * @package App\Domain\DTO\Security
 */
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

    /**
     * {@inheritdoc}
     */
    public function __construct(
        string       $name,
        string       $nick,
        string       $password,
        string       $email,
        \SplFileInfo $photo = null
    )
    {
        $this->name     = $name;
        $this->nick     = $nick;
        $this->password = $password;
        $this->email    = $email;
        $this->photo    = $photo;
    }

      /**  $constraints = $this->validator->validate($user);

        if (\count($constraints) > 0) {
        return false;
        }  **/
}