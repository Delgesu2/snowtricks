<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use App\Domain\Factory\Interfaces\VideoFactoryInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Entity\Interfaces\TrickInterface;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class UpdateTrickHandler
{
    private $fileUploaderHelper;
    private $session;
    private $requestStack;

    /**
     * @var TricksRepository
     */
    private $trickRepository;

    /**
     * @var PhotoFactoryInterface
     */
    private $photoFactory;

    /**
     * @var VideoFactoryInterface
     */
    private $videoFactory;

    /**
     * UpdateTrickHandler constructor.
     * @param SessionInterface $session
     * @param FileUploaderHelper $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param VideoFactoryInterface $videoFactory
     * @param TricksRepository $trickRepository
     */
    public function __construct(
        SessionInterface $session,
        FileUploaderHelper $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        VideoFactoryInterface $videoFactory,
        TricksRepository $trickRepository
    ) {

        $this->session            = $session;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->trickRepository    = $trickRepository;
        $this->videoFactory       = $videoFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(FormInterface $form, TrickInterface $trick) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $pictures = [];
            $videos = [];

            foreach ($form->getData()->photo as $photo) {
                $data = $this->fileUploaderHelper->upload($photo);
                $pictures[] = $this->photoFactory->create($data['filename'], $data['pictDir'], $data['filename']);
            }

            foreach ($form->getData()->video as $video) {
                $videos[] = $this->videoFactory->create($video);
            }

            $trick->update(
                $form->getData()->trick_name,
                $form->getData()->description,
                $form->getData()->trick_group,
                $form->getData()->photo,
                $form->getData()->video
                );

            $this->trickRepository->save($trick);

            $this->session->getFlashBag()->add('success', 'Trick enregistré');

            return true;
        }

        return false;
    }
}
