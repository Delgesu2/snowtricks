<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 14:21
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\DTO\Interfaces\NewTrickDTOInterface;

/**
 * Interface TrickFactoryInterface
 *
 * @package App\Domain\Factory\Interfaces
 */
interface TrickFactoryInterface
{
    /**
     * @param NewTrickDTOInterface $newTrickDTO
     *
     * @return mixed
     */
    public function create(NewTrickDTOInterface $newTrickDTO);
}