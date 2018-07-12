<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 18:33
 */

namespace App\Infra\Doctrine\Repository\Interfaces;


use Doctrine\Common\Persistence\ManagerRegistry;

interface TricksRepositoryInterface
{
    /**
     * TricksRepositoryInterface constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry);

    public function getAllTricks();

    /**
     * @param $slug
     * @return mixed
     */
    public function getOneTrick($slug);
}