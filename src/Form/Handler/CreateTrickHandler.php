<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use App\Domain\Factory\TrickFactory;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\FileUploaderHelper;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CreateTrickHandler implements CreateTrickHandlerInterface
{
    private $fileUploaderHelper;
    private $session;
    private $request;
    private $trickFactory;
    private $trickRepository;

    /**
     * CreateTrickHandler constructor.
     * @param SessionInterface $session
     * @param Request $request
     * @param FileUploaderHelper $fileUploaderHelper
     * @param TrickFactory $trickFactory
     * @param TricksRepository $trickRepository
     */
    public function __construct(
        SessionInterface $session,
        Request $request,
        FileUploaderHelper $fileUploaderHelper,
        TrickFactory $trickFactory,
        TricksRepository $trickRepository
    ) {

        $this->session            = $session;
        $this->request            = $request;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->trickFactory       = $trickFactory;
        $this->trickRepository    = $trickRepository;
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function flash($request)
    {
        $this->$request->addFlash(
            'Nouveau trick enregistré. Bravo ! Retour à la page d\'accueil'
        );
    }

    /**
     * @param FormInterface $form
     * @param GenerateFilename $generateFilename
     * @return bool
     */
    public function handle(
        FormInterface $form,
        FileUploaderHelper $fileUploaderHelper,
        GenerateFilename $generateFilename,
        UploadedFile $file
    ) :bool {

        if ($form->isSubmitted() && $form->isValid()) {

            $trick = $this->trickFactory->create($form->getData());

            foreach ($form->getData()->photo as $photo) {

                $this->trickRepository->save($trick);

                $fileUploaderHelper->pictHandler($generateFilename, $file);

            }

            // succes flash message
            $this->flash($this->request);

            return true;
        }
            return false;
    }
}