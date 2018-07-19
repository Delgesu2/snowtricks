<?php

namespace App\UI\Action;

use App\Form\Handler\CreateTrickHandler;
use App\UI\Action\Interfaces\CreateTrickActionInterface;
use App\Helper\FileUploaderHelper;
use App\Form\Type\CreateTrickType;
use App\UI\Responder\CreateTrickResponder;
use App\UI\Responder\Interfaces\CreateTrickResponderInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * @Route(name="create", path="/create")
 */
class CreateTrickAction implements CreateTrickActionInterface
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
     * @var UploadedFile
     */
    private  $load;

    /**
     * CreateTrickAction constructor.
     * @param FormFactoryInterface      $formFactory
     * @param EventDispatcherInterface  $eventDispatcher
     * @param FileUploaderHelper        $fileUploaderHelper
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelper $fileUploaderHelper,
        CreateTrickHandler $createTrickHandler
        )
    {
        $this->formFactory = $formFactory;
        $this->eventDispatcher = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->createTrickHandler = $createTrickHandler;
    }

    public function __invoke(
        Request $request,
        CreateTrickResponderInterface $responder,
        UrlGeneratorInterface $urlGenerator
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
