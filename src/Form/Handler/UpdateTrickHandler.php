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
use App\Form\Handler\Interfaces\UpdateTrickHandlerInterface;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class UpdateTrickHandler implements UpdateTrickHandlerInterface
{
    private $fileUploaderHelper;
    private $session;

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
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * UpdateTrickHandler constructor.
     * {@inheritdoc}
     */
    public function __construct(
        SessionInterface        $session,
        FileUploaderHelper      $fileUploaderHelper,
        PhotoFactoryInterface   $photoFactory,
        VideoFactoryInterface   $videoFactory,
        TricksRepository        $trickRepository,
        ValidatorInterface      $validator
    ) {

        $this->session            = $session;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->trickRepository    = $trickRepository;
        $this->videoFactory       = $videoFactory;
        $this->validator          = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form,
        TrickInterface $trick
    ) :bool
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

            $constraints = $this->validator->validate($trick, null, array('Trick'));

            if (\count($constraints) > 0) {
                return false;
            }

            $this->trickRepository->save($trick);

            $this->session->getFlashBag()->add('success', 'Trick modifié avec succès');

            return true;
        }

        return false;
    }
}
