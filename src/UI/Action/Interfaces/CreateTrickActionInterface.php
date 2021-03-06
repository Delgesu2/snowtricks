<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/07/18
 * Time: 19:11
 */

namespace App\UI\Action\Interfaces;

use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\UI\Responder\Interfaces\CreateTrickResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface CreateTrickActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface CreateTrickActionInterface
{
    /**
     * CreateTrickActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param EventDispatcherInterface $eventDispatcher
     * @param FileUploaderHelperInterface $fileUploaderHelper
     * @param CreateTrickHandlerInterface $createTrickHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelperInterface $fileUploaderHelper,
        CreateTrickHandlerInterface $createTrickHandler
    );

    /**
     * @param Request $request
     * @param CreateTrickResponderInterface $responder
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        CreateTrickResponderInterface $responder
    );
}