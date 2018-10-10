<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 21/09/18
 * Time: 22:27
 */

namespace App\Infra\Doctrine\Repository;

use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Domain\Entity\Photo;
use App\Infra\Doctrine\Repository\Interfaces\PhotosRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Class PhotosRepository
 *
 * @package App\Infra\Doctrine\Repository
 */
final class PhotosRepository extends ServiceEntityRepository implements PhotosRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Photo::class);
    }

    /**
     * {@inheritdoc}
     */
    public function save(PhotoInterface $photo)
    {
        $this->_em->persist($photo);
        $this->_em->flush();
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function deleteUserPhoto($user)
    {
        $photo = $this->createQueryBuilder('photo')
            ->where('photo.user_photo_id' == 'user.id')
            ->getQuery()
            ->getOneOrNullResult();

        return $photo;
    }
}