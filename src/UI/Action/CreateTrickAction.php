<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\GroupsRepository;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\CreateTrickResponder;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="create", path="/create")
 */
class CreateTrickAction
{
    private $repository;

    public function __construct(GroupsRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateTrickResponder $responder)
    {
        $groups = $this->repository->getAllGroups();

        return $responder($groups);
    }
}