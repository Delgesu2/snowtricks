<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/08/18
 * Time: 18:33
 */

namespace App\Helper\Interfaces;


interface FileUploaderHelperInterface
{
    public function upload(\SplFileInfo $splFileInfo): bool;
}