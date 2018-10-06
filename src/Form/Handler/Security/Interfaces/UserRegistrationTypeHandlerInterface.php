<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:09
 */

namespace App\Form\Handler\Security\Interfaces;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Helper\MailSubscriberHelper;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface UserRegistrationTypeHandlerInterface
 *
 * @package App\Form\Handler\Security\Interfaces
 */
interface UserRegistrationTypeHandlerInterface
{
    /**
     * UserRegistrationTypeHandlerInterface constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     * @param FileUploaderHelperInterface $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param UserFactoryInterface $userFactory
     * @param UsersRepositoryInterface $usersRepository
     * @param UserTrickInterface $user
     * @param UserPasswordEncoderInterface $encoder
     * @param MailSubscriberHelper $mailer
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param \Swift_Mailer $swift_Mailer
     */
    public function __construct(
        EncoderFactoryInterface        $encoderFactory,
        FileUploaderHelperInterface    $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository,
        UserTrickInterface             $user,
        UserPasswordEncoderInterface   $encoder,
        MailSubscriberHelper           $mailer,
        SessionInterface               $session,
        ValidatorInterface             $validator,
        \Swift_Mailer                  $swift_Mailer
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
