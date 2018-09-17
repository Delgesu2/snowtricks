<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\SelectedTrickResponder;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="selected_trick",
 *      path="/trick/{slug}",
 *      requirements={"slug"="[a-zA-Z0-9-]+"})
 */
class SelectedTrickAction
{
    private $repository;

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SelectedTrickResponder $responder, $slug)
    {
        $trick=$this->repository->getOneTrick($slug);
        return $responder($trick);
    }
}