<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 14:48
 */

namespace App\Form\Handler\Interfaces;

use App\Domain\Factory\TrickFactory;
use App\Form\Handler\GenerateFilename;
use App\Helper\FileUploaderHelper;
use App\Infra\Doctrine\Repository\TricksRepository;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Entity\Trick;

interface CreateTrickHandlerInterface
{
    /**
     * CreateTrickHandlerInterface constructor.
     * @param string $pictDir
     * @param SessionInterface $session
     * @param Request $request
     * @param FileUploaderHelper $fileUploaderHelper
     */
    public function __construct(
        SessionInterface $session,
        Request $request,
        FileUploaderHelper $fileUploaderHelper,
        TrickFactory $trickFactory,
        TricksRepository $tricksRepository

    );

    /**
     * @param FormInterface $form
     * @param FileUploaderHelper $fileUploaderHelper
     * @param GenerateFilename $generateFilename
     * @param UploadedFile $file
     * @return bool
     */
    public function handle(
        FormInterface $form,
        FileUploaderHelper $fileUploaderHelper,
        GenerateFilename $generateFilename,
        UploadedFile $file
    ) :bool ;

    /**
     * @param $request
     * @return mixed|void
     */
    public function flash($request);
}

