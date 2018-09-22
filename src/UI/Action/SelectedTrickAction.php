<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Action\Interfaces\SelectedTrickActionInterface;
use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="selected_trick",
 *      path="/trick/{slug}",
 *      requirements={"slug"="[a-zA-Z0-9-]+"})
 */
final class SelectedTrickAction implements SelectedTrickActionInterface
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
    public function __invoke(SelectedTrickResponderInterface $responder, $slug)
    {
        $trick=$this->repository->getOneTrick($slug);
        return $responder($trick);
    }
}