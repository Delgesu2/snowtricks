<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 13:51
 */

namespace App\Domain\Factory\Interfaces;

interface PhotoFactoryInterface
{
    /**
     * @param $title
     * @param $path
     * @param $alt
     * @return mixed
     */
    public function create($title, $path, $alt);
}