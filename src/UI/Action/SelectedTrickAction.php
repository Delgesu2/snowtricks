<?php

namespace App\UI\Action;

use App\Form\Handler\Interfaces\CommentHandlerInterface;
use App\Form\Type\CommentType;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Action\Interfaces\SelectedTrickActionInterface;
use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="selected_trick",
 *      path="/trick/{slug}",
 *      requirements={"slug"="[a-zA-Z0-9-]+"})
 */
final class SelectedTrickAction implements SelectedTrickActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $repository;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CommentHandlerInterface
     */
    private $handler;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        TricksRepositoryInterface $repository,
        FormFactoryInterface      $formFactory,
        CommentHandlerInterface   $handler
    )
    {
        $this->repository  = $repository;
        $this->formFactory = $formFactory;
        $this->handler     = $handler;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request,
        SelectedTrickResponderInterface $responder,
        $slug
    )
    {
        $commentType = $this->formFactory->create(CommentType::class)
            ->handleRequest($request);

        $trick = $this->repository->getOneTrick($slug);

        if ($this->handler->handle($commentType)) {

        return $responder($trick, $commentType);
    }

        return $responder($trick, $commentType);

    }

}