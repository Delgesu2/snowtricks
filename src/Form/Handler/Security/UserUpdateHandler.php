<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 22:02
 */

namespace App\Form\Handler\Security;

use App\Domain\Entity\User;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Form\Handler\Security\Interfaces\UserUpdateHandlerInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Helper\Interfaces\MailSubscriberHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\PhotosRepositoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UserUpdateHandler
 *
 * @package App\Form\Handler\Security
 */
final class UserUpdateHandler implements UserUpdateHandlerInterface
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @var FileUploaderHelperInterface
     */
    private $fileUploaderHelper;

    /**
     * @var UserFactoryInterface
     */
    private $userFactory;

    /**
     * @var PhotoFactoryInterface
     */
    private $photoFactory;

    /**
     * @var UsersRepositoryInterface
     */
    private $userRepository;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var \Swift_Mailer
     */
    private $swift_Mailer;

    /**
     * @var MailSubscriberHelperInterface
     */
    private $mailer;

    /**
     * @var Filesystem
     */
    private $fileSystem;

    /**
     * @var PhotosRepositoryInterface
     */
    private $photosRepository;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        EncoderFactoryInterface       $encoderFactory,
        FileUploaderHelperInterface   $fileUploaderHelper,
        PhotoFactoryInterface         $photoFactory,
        UsersRepositoryInterface      $userRepository,
        SessionInterface              $session,
        ValidatorInterface            $validator,
        \Swift_Mailer                 $swift_Mailer,
        MailSubscriberHelperInterface $mailer,
        Filesystem                    $filesystem,
        PhotosRepositoryInterface     $photosRepository
    ) {
        $this->encoderFactory     = $encoderFactory;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->userRepository     = $userRepository;
        $this->session            = $session;
        $this->validator          = $validator;
        $this->swift_Mailer       = $swift_Mailer;
        $this->mailer             = $mailer;
        $this->fileSystem         = $filesystem;
        $this->photosRepository   = $photosRepository;
    }


    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface      $form,
        UserTrickInterface $user
    ) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (!\is_null($user->getPhoto())){

                // delete file
                $this->fileSystem->remove($user->getPhoto()->getPath());

                // delete photo object
                $oldPhoto = $user->getPhoto();
                $this->photosRepository->deleteUserPhoto($oldPhoto);
            }

            if (!\is_null($form->getData()->photo)) {

                $photo = $this->photoFactory->createFromfile($form->getData()->photo);
                $this->fileUploaderHelper->upload($form->getData()->photo, $photo, 'users');

            }

           /** if (\is_null($form->getData()->password)) {

            }  **/

            $encoder = $this->encoderFactory->getEncoder(User::class);

            $user->update(
                $form->getData()->nick,
                $form->getData()->password = $encoder->encodePassword($form->getData()->password, null),
                $form->getData()->email,
                $form->getData()->photo
            );

            $user->addPhoto($photo);

            $constraints = $this->validator->validate($user,[],['UpdateUserDTO']);

            if (\count($constraints) > 0) {
                return false;
            }

            $this->userRepository->saveUser($user);

            $this->session->getFlashbag()->add('success', 'Vos données ont bien été modifiées.');

            return true;
        }

        return false;

    }

}