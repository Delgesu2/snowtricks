<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:08
 */

namespace App\Form\Handler\Security;


use App\Domain\DTO\Security\UserRegistrationDTO;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Entity\User;
use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Helper\MailSubscriberHelper;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class UserRegistrationTypeHandler
 *
 * @author Xavier Coutant
 */
final class UserRegistrationTypeHandler implements UserRegistrationTypeHandlerInterface
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
     * @var PhotoFactoryInterface
     */
    private $photoFactory;

    /**
     * @var UserFactoryInterface
     */
    private $userFactory;

    /**
     * @var UsersRepositoryInterface
     */
    private $usersRepository;

    /**
     * @var UserTrickInterface
     */
    private $user;

    /**
     * @var MailSubscriberHelper
     */
    private $mailer;

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
     * @inheritdoc
     */
    public function __construct(
        EncoderFactoryInterface        $encoderFactory,
        FileUploaderHelperInterface    $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository,
        UserPasswordEncoderInterface   $encoder,
        MailSubscriberHelper           $mailer,
        SessionInterface               $session,
        ValidatorInterface             $validator,
        \Swift_Mailer                  $swift_Mailer
    )
    {
        $this->encoderFactory     = $encoderFactory;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->userFactory        = $userFactory;
        $this->usersRepository    = $usersRepository;
        $this->userPasswordEncoder= $encoder;
        $this->mailer             = $mailer;
        $this->session            = $session;
        $this->validator          = $validator;
        $this->swift_Mailer       = $swift_Mailer;
    }

    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (!\is_null($form->getData()->photo)) {
                $photo = $this->photoFactory->createFromfile($form->getData()->photo);

                $this->fileUploaderHelper->upload($form->getData()->photo, $photo, 'users');
            }

                $encoder = $this->encoderFactory->getEncoder(User::class);
                $form->getData()->password = $encoder->encodePassword($form->getData()->password, null);

                $user = $this->userFactory->create($form->getData());

                $constraints = $this->validator->validate($user,[],['UserRegistrationDTO']);

                if (\count($constraints) > 0) {
                    return false;
                }

                if (!\is_null($form->getData()->photo)) {
                    $user->addPhoto($photo);
                }

                $this->mailer->registrationSend($form, $this->swift_Mailer, $user);

                $this->usersRepository->saveUser($user);

                return true;
        }

        return false;
    }
}

