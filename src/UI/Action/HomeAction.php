<?php

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\HomeResponder;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
*  @Route(name="home", path="/")
*/
final class HomeAction
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
    public function __invoke(HomeResponderInterface $responder)
    {
        $tricks = $this->repository->getAllTricks();

	    return $responder($tricks);
	}
}
