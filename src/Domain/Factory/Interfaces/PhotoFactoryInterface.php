<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/07/18
 * Time: 13:51
 */

namespace App\Domain\Factory\Interfaces;

use App\Domain\Entity\Interfaces\PhotoInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface PhotoFactoryInterface
 *
 * @package App\Domain\Factory\Interfaces
 */
interface PhotoFactoryInterface
{
    /**
     * @param \SplFileInfo $file
     *
     * @return PhotoInterface
     */
    public function createFromfile(\SplFileInfo $file): PhotoInterface;
}