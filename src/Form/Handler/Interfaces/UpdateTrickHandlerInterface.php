<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/08/18
 * Time: 12:15
 */

namespace App\Form\Handler\Interfaces;


use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\VideoFactoryInterface;
use App\Entity\Interfaces\TrickInterface;
use App\Helper\FileUploaderHelper;
use App\Infra\Doctrine\Repository\TricksRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface UpdateTrickHandlerInterface
{
    /**
     * UpdateTrickHandlerInterface constructor.
     * @param SessionInterface      $session
     * @param FileUploaderHelper    $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param VideoFactoryInterface $videoFactory
     * @param TricksRepository      $tricksRepository
     * @param ValidatorInterface    $validator
     */
    public function __construct(
        SessionInterface        $session,
        FileUploaderHelper      $fileUploaderHelper,
        PhotoFactoryInterface   $photoFactory,
        VideoFactoryInterface   $videoFactory,
        TricksRepository        $tricksRepository,
        ValidatorInterface      $validator
    );

    /**
     * @param FormInterface  $form
     * @param TrickInterface $trick
     * @return bool
     */
    public function handle(
        FormInterface   $form,
        TrickInterface  $trick
    ): bool;
}