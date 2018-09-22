<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 06:12
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\TricksListResponderInterface;

/**
 * Interface TricksListActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface TricksListActionInterface
{
    /**
     * TricksListActionInterface constructor.
     *
     * @param TricksRepositoryInterface $repository
     */
    public function __construct(TricksRepositoryInterface $repository);

    /**
     * @param TricksListResponderInterface $responder
     */
    public function __invoke(TricksListResponderInterface $responder);
}