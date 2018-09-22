<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/09/18
 * Time: 22:28
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

use App\Domain\Entity\Interfaces\PhotoInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Interface PhotosRepositoryInterface
 *
 * @package App\Infra\Doctrine\Repository\Interfaces
 */
interface PhotosRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ManagerRegistry $registry);

    /**
     * {@inheritdoc}
     */
    public function save(PhotoInterface $photo);
}