<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 21:51
 */

namespace App\Domain\DTO\Security\Interfaces;

/**
 * Interface UpdateUserDTOInterface
 *
 * @package App\Domain\DTO\Security\Interfaces
 */
interface UpdateUserDTOInterface
{
    /**
     * UpdateUserDTOInterface constructor.
     *
     * @param string $name
     * @param $nick
     * @param $password
     * @param $email
     * @param $photo
     */
    public function __construct(
        $name,
        $nick,
        $password,
        $email,
        $photo
    );
}