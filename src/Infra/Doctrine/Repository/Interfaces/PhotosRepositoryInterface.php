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
     * PhotosRepositoryInterface constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry);

    /**
     * @param PhotoInterface $photo
     *
     * @return mixed
     */
    public function save(PhotoInterface $photo);

    /**
     * @param $oldPhoto
     *
     * @return mixed
     */
    public function deleteUserPhoto($oldPhoto);
}