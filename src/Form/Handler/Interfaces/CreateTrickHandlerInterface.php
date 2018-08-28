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
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
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
     * @param SessionInterface $session
     * @param RequestStack $requestStack
     * @param FileUploaderHelper $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param TrickFactory $trickFactory
     * @param TricksRepositoryInterface $tricksRepository
     * @param VideoFactoryInterface $videoFactory
     * @param ValidatorInterface $validator
     */
    public function __construct(
        SessionInterface $session,
        RequestStack $requestStack,
        FileUploaderHelper $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        TrickFactory $trickFactory,
        TricksRepositoryInterface $tricksRepository,
        VideoFactoryInterface $videoFactory,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form) :bool ;
}

