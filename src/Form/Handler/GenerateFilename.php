<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/07/18
 * Time: 16:09
 */

namespace App\Form\Handler;


class GenerateFilename
{
    /**
     * @return string
     */
    public function generateUniqueFilename()
    {
        return md5(uniqid());
    }
}