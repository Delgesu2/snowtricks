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

    public function fileUploader(GenerateFilename $generateFilename, UploadedFile $file)
    {
        // create filename for database
        $filename = $generateFilename->generateUniqueFilename() . '.' . $file->guessExtension();

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