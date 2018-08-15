<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\HomeResponder;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
*  @Route(name="home", path="/")
*/
class HomeAction
{
    private $repository;

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(HomeResponderInterface $responder)
    {
        $tricks = $this->repository->getAllTricks();

	    return $responder($tricks);
	}
}
