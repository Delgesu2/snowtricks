<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 22:03
 */

namespace App\Form\Handler\Security\Interfaces;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Helper\Interfaces\MailSubscriberHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface UserUpdateHandlerInterface
{
    /**
     * UserUpdateHandlerInterface constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     * @param FileUploaderHelperInterface $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param UsersRepositoryInterface $userRepository
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param \Swift_Mailer $swift_Mailer
     * @param MailSubscriberHelperInterface $mailer
     */
    public function __construct(
        EncoderFactoryInterface $encoderFactory,
        FileUploaderHelperInterface $fileUploaderHelper,
        PhotoFactoryInterface $photoFactory,
        UsersRepositoryInterface $userRepository,
        SessionInterface $session,
        ValidatorInterface $validator,
        \Swift_Mailer $swift_Mailer,
        MailSubscriberHelperInterface $mailer
    );

    /**
     * @param FormInterface $form
     * @param UserTrickInterface $user
     *
     * @return bool
     */
    public function handle(
        FormInterface     $form,
        UserTrickInterface $user
    ) :bool;
}