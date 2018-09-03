<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/06/18
 * Time: 18:28
 */

declare(strict_types=1);

namespace App\Helper;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderHelper
{
    /**
     * @var string
     */
    private $pictDir;

    /**
     * FileUploaderHelperInterface constructor
     * @param UploadedFile     $file
     * @param string           $pictDir
     */
    public function __construct(
        //UploadedFile $file,
        string $pictDir
    )
    {
       // $this->file = $file;
        $this->pictDir = $pictDir;
    }

    public function upload(UploadedFile $file)
    {
        // create filename for database
        $filename = md5(uniqid()) . '.' . $file->guessExtension();

        // move file to /tricks directory (à appeler dans la boucle du handler)
        $file->move(
            $this->pictDir,
            $filename
        );

        return [
            'filename' => $filename,
            'pictDir'  => $this->pictDir
        ];
    }
}