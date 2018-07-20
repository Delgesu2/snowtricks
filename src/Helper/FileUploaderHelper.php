<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/06/18
 * Time: 18:28
 */

declare(strict_types=1);

namespace App\Helper;

use App\Form\Handler\GenerateFilename;
use Symfony\Component\HttpFoundation\File\UploadedFile;


class FileUploaderHelper
{
    /**
     * @var string
     */
    private $imageFolder;

    /**
     * @var GenerateFilename
     */
    private $generateFilename;

    /**
     * @var string
     */
    private $file;

    /**
     * @var string
     */
    private $pictDir;

    /**
     * FileUploaderHelper constructor.
     * @param string $imageFolder
     */
    public function __construct(
        string $imageFolder,
        GenerateFilename $generateFilename,
        UploadedFile $file,
        string $pictDir
    )
    {
        $this->imageFolder = $imageFolder;
        $this->generateFilename = $generateFilename;
        $this->file = $file;
        $this->pictDir = $pictDir;
    }

    public function pictHandler(GenerateFilename $generateFilename, UploadedFile $file)
    {
        // create filename for database
        $filename = $generateFilename->generateUniqueFilename() . '.' . $file->guessExtension();

        // set $filename
        $title = $filename;

        // set $alt
        $alt = $title;

        // add $filename and public folder to get $path
        $path = $this->pictDir . $filename;

        // move file to /tricks directory (à appeler dans la boucle du handler)
        $file->move(
            $this->pictDir,
            $filename
        );
    }

    /**
     * @return string
     */
    public function getImageFolder(): string
    {
        return $this->imageFolder;
    }
}