<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/08/18
 * Time: 20:33
 */

namespace App\UI\Action;

use App\Domain\DTO\DTOBuilder;
use App\Domain\DTO\UpdateTrickDTO;
use App\Form\Handler\UpdateTrickHandler;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\Interfaces\UpdateTrickResponderInterface;
use App\Helper\FileUploaderHelper;
use App\Form\Type\UpdateTrickType;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="update_trick", path="/update/{slug}", requirements={"slug"="[a-zA-Z0-9-]+"})
 */
class UpdateTrickAction
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
     * @var UpdateTrickHandler
     */
    private $updateTrickHandler;

    /**
     * @var TricksRepository
     */
    private $repository;

    /**
     * @var DTOBuilder
     */
    private $DTOBuilder;


    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelper $fileUploaderHelper,
        UpdateTrickHandler $updateTrickHandler,
        TricksRepository $repository,
        DTOBuilder $DTOBuilder
    )
    {
        $this->formFactory = $formFactory;
        $this->eventDispatcher = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->updateTrickHandler = $updateTrickHandler;
        $this->repository = $repository;
        $this->DTOBuilder = $DTOBuilder;
    }

    public function __invoke(
        Request $request,
        UpdateTrickResponderInterface $responder
    )
    {
        $trick=$this->repository->getOneTrick($request->attributes->get('slug'));

        $dto = $this->DTOBuilder->hydrateTrickDTO($trick);

        $updateTrickType = $this->formFactory->create(UpdateTrickType::class, $dto)
                            ->handleRequest($request);

        if ($this->updateTrickHandler->handle($updateTrickType, $trick)){
            //redirection page d'accueil
        }
         return $responder($updateTrickType);
    }
}