<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/10/18
 * Time: 23:53
 */

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\EmailCheckDTOInterface;

/**
 * Class EmailCheckDTO
 *
 * @package App\Domain\DTO\Security
 */
final class EmailCheckDTO implements EmailCheckDTOInterface
{
    /**
     * @var string
     */
    public $email;

    /**
     * {@inheritdoc}
     */
    public function __construct($email)
    {
        $this->email = $email;
    }
}