<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 19:53
 */

namespace App\Domain\DTO\Interfaces;


interface UpdateVideoDTOInterface
{
    /**
     * UpdateVideoDTOInterface constructor.
     *
     * @param $url
     */
    public function __construct($url);
}