<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 15:00
 */

namespace App\Domain\Factory\Interfaces;

/**
 * Interface VideoFactoryInterface
 *
 * @package App\Domain\Factory\Interfaces
 */
interface VideoFactoryInterface
{
    /**
     * @param $url
     * @return mixed
     */
    public function create($url);
}