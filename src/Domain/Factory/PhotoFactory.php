<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 19/07/18
 * Time: 16:28
 */

namespace App\Domain\Factory;

use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Photo;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;

/**
 * Class PhotoFactory
 *
 * @package App\Domain\Factory
 */
final class PhotoFactory implements PhotoFactoryInterface
{
    /**
     * @var PhotoInterface
     */
    private $photo;

    /**
     * {@inheritdoc}
     */
    public function createFromFile(\SplFileInfo $file): PhotoInterface
    {
        $title = md5(str_rot13($file->getBasename('.'.$file->getExtension())));

        return new Photo(
            $title . '.' . $file->guessExtension(),
            $title,
            $title
        );
    }
}
