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
use App\Helper\Interfaces\FileUploaderHelperInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * Class FileUploaderHelper
 *
 * @package App\Helper
 */
final class FileUploaderHelper implements FileUploaderHelperInterface
{
    /**
     * @var string
     */
    private $pictDir;

    /**
     * {@inheritdoc}
     */
    public function __construct(string $pictDir)
    {
        $this->pictDir = $pictDir;
    }

    /**
     * {@inheritdoc}
     */
    public function upload(
        UploadedFile $file,
      PhotoInterface $photo,
        string $folder = ''
)
    {
        // move file
       $file->move(
            $this->pictDir . '/' . $folder,
            $photo->getTitle()
        );

        $photo->upload($this->pictDir. '/' . $folder . '/' . $photo->getTitle());
    }
}
