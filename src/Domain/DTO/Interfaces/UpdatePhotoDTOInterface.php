<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 07/08/18
 * Time: 19:48
 */

namespace App\Domain\DTO\Interfaces;


interface UpdatePhotoDTOInterface
{
    /**
     * UpdatePhotoDTOInterface constructor.
     *
     * @param $title
     * @param $path
     * @param $alt
     */
    public function __construct(
        $title,
        $path,
        $alt
    );
}