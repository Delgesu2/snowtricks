<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 06:09
 */

namespace App\UI\Action\Interfaces;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;

/**
 * Interface SelectedTrickActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface SelectedTrickActionInterface
{
    /**
     * SelectedTrickActionInterface constructor.
     *
     * @param TricksRepositoryInterface $repository
     */
    public function __construct(TricksRepositoryInterface $repository);

    /**
     * @param SelectedTrickResponderInterface $responder
     * @param $slug
     *
     * @return mixed
     */
    public function __invoke(SelectedTrickResponderInterface $responder, $slug);
}