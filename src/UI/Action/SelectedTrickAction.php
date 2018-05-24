<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\SelectedTrickResponder;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="trick", path="/trick/{slug}")
 */

class SelectedTrickAction
{
    private $repository;

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(SelectedTrickResponder $responder)
    {
        $tricks=$this->repository->getAllTricks();
        return $responder($tricks);
    }
}