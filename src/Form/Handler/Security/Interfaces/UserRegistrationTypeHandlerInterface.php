<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:09
 */

namespace App\Form\Handler\Security\Interfaces;


use App\Helper\MailSubscriberHelper;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Helper\Interfaces\OneFileUploaderHelperInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

interface UserRegistrationTypeHandlerInterface
{
    /**
     * UserRegistrationTypeHandlerInterface constructor.
     *
     * @param UserFactoryInterface $userFactory
     * @param UsersRepositoryInterface $usersRepository
     * @param UserInterface $user
     * @param UserPasswordEncoderInterface $encoder
     */
    public function __construct(
        EncoderFactoryInterface        $encoderFactory,
        /**OneFileUploaderHelperInterface $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,**/
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository,
        UserPasswordEncoderInterface   $encoder,
        MailSubscriberHelper           $mailer
    );

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
