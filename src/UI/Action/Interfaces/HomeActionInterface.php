<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 06:06
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;

/**
 * Interface HomeActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface HomeActionInterface
{
    /**
     * HomeActionInterface constructor.
     *
     * @param TricksRepositoryInterface $repository
     */
    public function __construct(TricksRepositoryInterface $repository);

    /**
     * @param HomeResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(HomeResponderInterface $responder);
}