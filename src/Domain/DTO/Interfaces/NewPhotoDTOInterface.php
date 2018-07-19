<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 17:25
 */

namespace App\Domain\DTO\Interfaces;


interface NewPhotoDTOInterface
{
    /**
     * NewPhotoDTOInterface constructor.
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