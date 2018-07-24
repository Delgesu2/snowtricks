<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use App\Domain\Factory\Interfaces\VideoFactoryInterface;
use App\Domain\Factory\PhotoFactory;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
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

    /**
     * @var PhotoFactoryInterface
     */
    private $photoFactory;
    private $trickFactory;
    private $trickRepository;

    /**
     * @var VideoFactoryInterface
     */
    private $videoFactory;

    /**
     * CreateTrickHandler constructor.
     * @param SessionInterface $session
     * @param Request $request
     * @param FileUploaderHelper $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param TrickFactory $trickFactory
     * @param TricksRepository $trickRepository
     * @param VideoFactoryInterface $videoFactory
     */
    public function __construct(
        SessionInterface $session,
        Request $request,
        FileUploaderHelper $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        TrickFactory $trickFactory,
        TricksRepository $trickRepository,
        VideoFactoryInterface $videoFactory
    ) {

        $this->session            = $session;
        $this->request            = $request;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->trickFactory       = $trickFactory;
        $this->trickRepository    = $trickRepository;
        $this->videoFactory       = $videoFactory;
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
            $pictures = [];
            $videos = [];

            foreach ($form->getData()->photo as $photo) {
                $data = $fileUploaderHelper->fileUploader($generateFilename, $photo);
                $pictures[] = $this->photoFactory->create($data['filename'], $data['pictDir'], $data['filename']);
            }

            foreach ($form->getData()->video as $video) {
                $videos[] = $this->videoFactory->create($video);
            }

            // succes flash message
            $this->flash($this->request);

            $this->trickRepository->save($trick);

            return true;
        }
            return false;
    }
}