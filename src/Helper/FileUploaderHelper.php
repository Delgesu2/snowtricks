<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/06/18
 * Time: 18:28
 */

declare(strict_types=1);

namespace App\Helper;

use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Photo;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\PhotoFactory;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class FileUploaderHelper implements FileUploaderHelperInterface
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

    /**
     * @inheritdoc
     */
    public function upload(UploadedFile $file, PhotoFactoryInterface $photoFactory)
    {
          $filename = new PhotoFactory();

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