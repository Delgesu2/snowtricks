<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 14:48
 */

namespace App\Form\Handler\Interfaces;


use App\Domain\Factory\Interfaces\VideoFactoryInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\TrickFactory;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface CreateTrickHandlerInterface
{

    /**
     * CreateTrickHandlerInterface constructor.
     *
     * @param SessionInterface $session
     * @param RequestStack $requestStack
     * @param FileUploaderHelper $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param TrickFactory $trickFactory
     * @param TricksRepository $tricksRepository
     * @param VideoFactoryInterface $videoFactory
     */
    public function __construct(
        SessionInterface $session,
        RequestStack $requestStack,
        FileUploaderHelper $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        TrickFactory $trickFactory,
        TricksRepository $tricksRepository,
        VideoFactoryInterface $videoFactory
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form, ValidatorInterface $validator) :bool ;
}

