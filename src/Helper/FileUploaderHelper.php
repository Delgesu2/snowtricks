<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/06/18
 * Time: 18:28
 */

declare(strict_types=1);

namespace App\Helper;


class FileUploaderHelper
{
    /**
     * @var string
     */
    private $imageFolder;

    /**
     * FileUploaderHelper constructor.
     * @param string $imageFolder
     */
    public function __construct(string $imageFolder)
    {
        $this->imageFolder = $imageFolder;
    }

     // create filename for database
    $filename = $generateFilename->generateUniqueFilename() . '.' . $file->guessExtension(); //avec nom de la photo

    // set $alt
    $alt = $title;

    // add $filename and public folder to get $path
    $path =  $this->$pictDir . $filename;

    // move file to /tricks directory (à appeler dans la boucle du handler)
    $file->move(
    $this->pictDir,
    $photo   fichier
    );


    /**
     * @return string
     */
    public function getImageFolder(): string
    {
        return $this->imageFolder;
    }
}