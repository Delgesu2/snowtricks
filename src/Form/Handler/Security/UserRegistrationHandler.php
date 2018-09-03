<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:08
 */

namespace App\Form\Handler\Security;


use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Entity\User;
use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use App\Helper\Interfaces\OneFileUploaderHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

/**
 * Class UserRegistrationHandler
 *
 * @author Xavier Coutant
 */
final class UserRegistrationHandler implements UserRegistrationTypeHandlerInterface
{
    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * @var OneFileUploaderHelperInterface
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
     * @inheritdoc
     */
    public function __construct(
        EncoderFactoryInterface        $encoderFactory,
        OneFileUploaderHelperInterface $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository
    )
    {
        $this->encoderFactory     = $encoderFactory;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;
        $this->userFactory        = $userFactory;
        $this->usersRepository    = $usersRepository;
    }

    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if (!\is_null($form->getData()->photo)) {
                $media = $this->photoFactory->createFromfile($form->getData()->photo);
                $this->fileUploaderHelper->upload($form->getData()->photo, $media);
            }

            $encoder = $this->encoderFactory->getEncoder(User::class);

            $password = $encoder->encodePassword($form->getData()->password, null);

            $user = $this->userFactory->create(
                $form->getData()->name,
                $form->getData()->nick,
                $password,
                $form->getData()->email,
                $media ?? null
            );

          $this->usersRepository->saveUser($user);

            return true;
        }

        return false;
    }
}