<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/08/18
 * Time: 18:33
 */

namespace App\Helper\Interfaces;

use App\Domain\Entity\Interfaces\PhotoInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Interface FileUploaderHelperInterface
 *
 * @package App\Helper\Interfaces
 */
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
    public function upload(UploadedFile $file, PhotoInterface $photo, string $folder = '');
}