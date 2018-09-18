<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/08/18
 * Time: 18:33
 */

namespace App\Helper\Interfaces;


use Symfony\Component\HttpFoundation\File\UploadedFile;

interface FileUploaderHelperInterface
{
    /**
     * FileUploaderHelperInterface constructor.
     *
     * @param string $pictDir
     */
    public function __construct(string $pictDir);

    /**
     * @param UploadedFile $file
     *
     * @return mixed
     */
    public function upload(UploadedFile $file);
}