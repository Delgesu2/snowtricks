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
use App\Domain\Factory\TrickFactory;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CreateTrickHandler implements CreateTrickHandlerInterface
{
    private $fileUploaderHelper;
    private $session;
    private $requestStack;

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
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * CreateTrickHandler constructor.
     * @param SessionInterface $session
     * @param RequestStack $requestStack
     * @param FileUploaderHelper $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param TrickFactory $trickFactory
     * @param TricksRepository $trickRepository
     * @param VideoFactoryInterface $videoFactory
     */
    public function __construct(
        SessionInterface $session,
        RequestStack $requestStack,
        FileUploaderHelper $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        TrickFactory $trickFactory,
        TricksRepository $trickRepository,
        VideoFactoryInterface $videoFactory,
        ValidatorInterface $validator
    ) {

        $this->session            = $session;
        $this->requestStack       = $requestStack;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->trickFactory       = $trickFactory;
        $this->trickRepository    = $trickRepository;
        $this->videoFactory       = $videoFactory;
        $this->validator          = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(FormInterface $form) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $trick = $this->trickFactory->create($form->getData());
            $pictures = [];
            $videos = [];

            foreach ($form->getData()->photo as $photo) {
                $data = $this->fileUploaderHelper->upload($photo);
                $pictures[] = $this->photoFactory->create($data['filename'], $data['pictDir'], $data['filename']);
            }

            foreach ($form->getData()->video as $video) {
                $videos[] = $this->videoFactory->create($video);
            }

            $constraints = $this->validator->validate($trick,[],['Trick']);

            if (\count($constraints) > 0) {
                return false;
            }

            $this->trickRepository->save($trick);

            $this->session->getFlashBag()->add('success', 'Trick enregistré');

            return true;
        }

        return false;
    }
}
