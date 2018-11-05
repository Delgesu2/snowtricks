<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 18:33
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

use App\Domain\Entity\Interfaces\TrickInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * Interface TricksRepositoryInterface
 *
 * @package App\Infra\Doctrine\Repository\Interfaces
 */
interface TricksRepositoryInterface
{
    /**
     * TricksRepositoryInterface constructor.
     *
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry);

    /**
     * @return mixed
     */
    public function getAllTricks();

    /**
     * @param $slug
     *
     * @return mixed
     */
    public function getOneTrick($slug);

    /**
     * @param TrickInterface $trick
     *
     * @return mixed
     */
    public function save(TrickInterface $trick);

    /**
     * @return mixed
     */
    public function update();

    /**
     * @param $trick
     *
     * @return mixed
     */
    public function deleteTrick($trick);
}