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
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class CreateTrickHandler
 *
 * @package App\Form\Handler
 */
final class CreateTrickHandler implements CreateTrickHandlerInterface
{
    private $fileUploaderHelper;
    private $session;
    private $requestStack;

    /**
     * @var PhotoFactoryInterface
     */
    private $photoFactory;
    private $trickFactory;
    private $tricksRepository;

    /**
     * @var VideoFactoryInterface
     */
    private $videoFactory;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @inheritdoc
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
    ) {

        $this->session            = $session;
        $this->requestStack       = $requestStack;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->trickFactory       = $trickFactory;
        $this->tricksRepository   = $tricksRepository;
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

                dump($trick);
                die;

                //$pictures[] = $this->photoFactory->createFromfile($data['filename'], $data['pictDir'], $data['filename']);
                $pictures[] = $this->photoFactory->createFromfile($form->getData()->photo);
                $this->fileUploaderHelper->upload($form->getData()->photo, $photo, 'tricks');
            }

            foreach ($form->getData()->video as $video) {
                $videos[] = $this->videoFactory->create($video);
            }

            $trick->addPhoto($pictures);  // addPhoto est dans Trick, pas dans $trick qui est ici le Factory
            $trick->addVideo($videos);


            $constraints = $this->validator->validate($trick,[],['Trick']);

            if (\count($constraints) > 0) {
                return false;
            }

            $this->tricksRepository->save($trick);

            $this->session->getFlashBag()->add('success', 'Trick enregistré');

            return true;  // Pourquoi ça ramène à 'home' ?
        }

        return false;
    }
}
