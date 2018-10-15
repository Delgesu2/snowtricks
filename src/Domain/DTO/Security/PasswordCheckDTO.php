<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 19:40
 */

namespace App\Domain\DTO\Security;

use App\Domain\DTO\Security\Interfaces\PasswordCheckDTOInterface;

/**
 * Class PasswordCheckDTO
 *
 * @package App\Domain\DTO\Security
 */
final class PasswordCheckDTO implements PasswordCheckDTOInterface
{
    /**
     * @var string
     */
    public $newpassword;

    /**
     * @var string
     */
    public $checknewpassword;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        string $newpassword,
        string $checknewpassword)
    {
        $this->newpassword      = $newpassword;
        $this->checknewpassword = $checknewpassword;
    }

}