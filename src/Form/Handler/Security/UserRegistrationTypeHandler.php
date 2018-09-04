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
use App\Entity\Interfaces\UserTrickInterface;
use App\Entity\User;
use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use App\Helper\Interfaces\OneFileUploaderHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

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
     * @var UserInterface
     */
    private $user;

    /**
     * @var UserPasswordEncoderInterface
     */
    private $encoder;


    /**
     * @inheritdoc
     */
    public function __construct(
        /**EncoderFactoryInterface        $encoderFactory,
        OneFileUploaderHelperInterface $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,**/
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository,
        UserInterface                  $user,
        UserPasswordEncoderInterface   $encoder
    )
    {
        /**$this->encoderFactory     = $encoderFactory;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->photoFactory       = $photoFactory;**/
        $this->userFactory        = $userFactory;
        $this->usersRepository    = $usersRepository;
        $this->user               = $user;
        $this->userPasswordEncoder= $encoder;
    }


    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {



            // ENCODAGE
            $plainPassword = $form->get('password')->getNormData();

            $encoded = $this->encoder->encodePassword($this->user, $plainPassword);

            $form->setData($encoded);
            // FIN ENCODAGE

            $newUser = $this->userFactory->create($form->getData());

            $this->usersRepository->saveUser($newUser);

            return true;
        }

        return false;
    }
}

/** if (!\is_null($form->getData()->photo)) {
$media = $this->photoFactory->createFromfile($form->getData()->photo);
$this->fileUploaderHelper->upload($form->getData()->photo, $media);
}
 **/