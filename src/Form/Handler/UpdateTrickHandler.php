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
use App\Domain\Entity\Interfaces\TrickInterface;
use App\Form\Handler\Interfaces\UpdateTrickHandlerInterface;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Helper\FileUploaderHelper;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UpdateTrickHandler
 *
 * @package App\Form\Handler
 */
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

            /**
            foreach ($trick->getVideo()->toArray() as $item) {

                $item->removeElement($item);
            }

            foreach ($form->getData()->video as $video) {
                $videos[] = $this->videoFactory->create($video);
            }

            $trick->addVideo($videos);**/

/**

            if(count($trick->getVideo()->toArray()) !== count($form->getData()->video)) {

                if (count($trick->getVideo()->toArray()) == 0 && count($form->getData()->video) !== 0) {

                    foreach ($form->getData()->video as $video) {
                        $videos[] = $this->videoFactory->create($video);
                    }

                    $trick->addVideo($videos);
                }

            }





                /**
                if (count($form->getData()->video) > count($trick->getVideo()->toArray())) {

                    foreach ( $trick->getVideo()->toArray() as $video) {

                        $url[] = $video->getUrl();

                    }

                    $diff = array_diff($url, $form->getData()->video);

                    foreach ($diff as $video) {
                        $videos[] = $this->videoFactory->create($video);
                    }

                    $trick->addVideo($videos);

                } **/






/**

            if (count($trick->getPhoto()->toArray()) !== count($form->getData()->photo)) {

                if (count($trick->getPhoto()->toArray()) == 0 && count($form->getData()->photo !== 0)) {

                    foreach ($form->getData()->photo as $photo) {
                        $photos[] = $this->photoFactory->createFromfile($photo);
                    }

                    $trick->addPhoto($photos);
                }
            }
 **/

            $pictures = [];
            $videos = [];


          /**  foreach ($form->getData()->photo as $photo) {

                $newPhoto = $this->photoFactory->createFromfile($photo);
                $this->fileUploaderHelper->upload($photo, $newPhoto, 'tricks');
                $pictures[] = $newPhoto;

            }



            $trick->update(
                $form->getData()->trick_name,
                $form->getData()->description,
                $form->getData()->trick_group,
                $form->getData()->photo,
                $form->getData()->video
                );

            $constraints = $this->validator->validate($trick, [], array('UpdateTrickDTO'));

            if (\count($constraints) > 0) {
                return false;
            }  **/

            $this->trickRepository->update();

            $this->session->getFlashBag()->add('success', 'Trick modifié avec succès');

            return true;
        }

        return false;
    }
}
