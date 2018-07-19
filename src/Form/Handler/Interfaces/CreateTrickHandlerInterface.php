<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/07/18
 * Time: 14:48
 */

namespace App\Form\Handler\Interfaces;

use App\Domain\Factory\TrickFactory;
use App\Entity\Photo;
use App\Form\Handler\GenerateFilename;
use App\Helper\FileUploaderHelper;
use Doctrine\Common\Persistence\ManagerRegistry;
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
        string $pictDir,
        SessionInterface $session,
        Request $request,
        FileUploaderHelper $fileUploaderHelper,
        ManagerRegistry $registry,
        TrickFactory $trickFactory
    );

    /**
     * @param $request
     * @return mixed|void
     */
    public function flash($request);

    /**
     * @param FormInterface $form
     * @param UploadedFile $file
     * @param GenerateFilename $generateFilename
     * @return bool
     */
    public function handle(
        FormInterface $form,
        UploadedFile $file,
        GenerateFilename $generateFilename,
        Trick $trick,
        Photo $photo
    ) :bool ;
}
