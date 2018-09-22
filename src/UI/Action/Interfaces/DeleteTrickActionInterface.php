<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 17:05
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Interface DeleteTrickActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface DeleteTrickActionInterface
{
    /**
     * DeleteTrickActionInterface constructor.
     *
     * @param TricksRepositoryInterface $repository
     */
    public function __construct(TricksRepositoryInterface $repository);

    /**
     * @param HomeResponderInterface $responder
     * @param $slug
     *
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $responder, $slug);
}