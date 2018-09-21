<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/09/18
 * Time: 14:26
 */

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\UserConnectionDTOInterface;

class UserConnectionDTO implements UserConnectionDTOInterface
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $password;

    /**
     * @var bool
     */
    public $keep;

    /**
     * @inheritdoc
     */
    public function __construct(
        string $name,
        string $password,
        bool   $keep
    )
    {
        $this->name     = $name;
        $this->password = $password;
        $this->keep     = $keep;
    }
}
