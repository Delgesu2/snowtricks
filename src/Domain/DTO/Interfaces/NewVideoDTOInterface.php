<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 18:42
 */

namespace App\Domain\DTO\Interfaces;

/**
 * Interface NewVideoDTOInterface
 *
 * @package App\Domain\DTO\Interfaces
 */
interface NewVideoDTOInterface
{
    /**
     * NewVideoDTOInterface constructor.
     *
     * @param $url
     */
    public function __construct($url);
}
