<?php

namespace App\UI\Action;

use App\Form\Handler\CreateTrickHandler;
use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\UI\Action\Interfaces\CreateTrickActionInterface;
use App\Helper\FileUploaderHelper;
use App\Form\Type\CreateTrickType;
use App\UI\Responder\Interfaces\CreateTrickResponderInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class CreateTrickAction
 *
 * @Route(
 *     name="create",
 *     path="/create"
 *     )
 */
final class CreateTrickAction implements CreateTrickActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FileUploaderHelper
     */
    private $fileUploaderHelper;

    /**
     * @var CreateTrickHandler
     */
    private $createTrickHandler;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        FormFactoryInterface     $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelperInterface $fileUploaderHelper,
        CreateTrickHandlerInterface $createTrickHandler
        )
    {
        $this->formFactory        = $formFactory;
        $this->eventDispatcher    = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->createTrickHandler = $createTrickHandler;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        Request $request,
        CreateTrickResponderInterface $responder
    )
    {
        $createTrickType = $this->formFactory->create(CreateTrickType::class)
                                ->handleRequest($request);

        if ($this->createTrickHandler->handle($createTrickType)) {

            return $responder(true);

        }

        return $responder(false, $createTrickType);
    }
}
