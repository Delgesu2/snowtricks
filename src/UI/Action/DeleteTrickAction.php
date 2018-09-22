<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/08/18
 * Time: 17:41
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="delete_trick", path="/delete/{slug}", requirements={"slug"="[a-zA-Z0-9-]+"})
 */
final class DeleteTrickAction implements DeleteTrickActionInterface
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
     */
    public function __invoke(HomeResponderInterface $responder, $slug)
    {
        $this->repository->deleteTrick($slug);
        $tricks = $this->repository->getAllTricks();

        return $responder($tricks);
    }

}