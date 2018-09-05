<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 13:51
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\Entity\Interfaces\PhotoInterface;

interface PhotoFactoryInterface
{
    /**
     * @param $title
     * @param $path
     * @param $alt
     * @return mixed
     */
    public function create($title, $path, $alt);

    public function createFromfile(\SplFileInfo $file): PhotoInterface;
}