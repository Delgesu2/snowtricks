<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 17:10
 */

namespace App\Infra\Doctrine\Repository\Interfaces;

use Doctrine\Common\Persistence\ManagerRegistry;

interface GroupsRepositoryInterface
{
    /**
     * GroupsRepositoryInterface constructor.
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry);

    /**
     * @return mixed
     */
    public function getAllGroups();
}
