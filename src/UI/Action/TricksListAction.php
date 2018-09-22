<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 16:51
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\TricksListResponderInterface;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Action\Interfaces\TricksListActionInterface;

/**
* @Route(name="trickslist", path="/list")
*/
final class TricksListAction implements TricksListActionInterface
{
    private $repository;

    /**
     * {@inheritdoc}
     */
    public function __construct(TricksRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(TricksListResponderInterface $responder)
    {
        $tricks = $this->repository->getAllTricks();

        return $responder($tricks);
    }
}