<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 17:29
 */

namespace App\UI\Action\Interfaces;

use App\Domain\DTO\Interfaces\DTOBuilderInterface;
use App\Form\Handler\Interfaces\UpdateTrickHandlerInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\UpdateTrickResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface UpdateTrickActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface UpdateTrickActionInterface
{
    /**
     * UpdateTrickActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param EventDispatcherInterface $eventDispatcher
     * @param FileUploaderHelperInterface $fileUploaderHelper
     * @param UpdateTrickHandlerInterface $updateTrickHandler
     * @param TricksRepositoryInterface $repository
     * @param DTOBuilderInterface $DTOBuilder
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelperInterface $fileUploaderHelper,
        UpdateTrickHandlerInterface $updateTrickHandler,
        TricksRepositoryInterface $repository,
        DTOBuilderInterface $DTOBuilder
    );

    /**
     * @param Request $request
     * @param UpdateTrickResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        UpdateTrickResponderInterface $responder
    );
}