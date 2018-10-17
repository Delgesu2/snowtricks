<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/10/18
 * Time: 12:28
 */

namespace App\Form\Handler\Security;

use App\Domain\Entity\User;
use App\Form\Handler\Security\Interfaces\PasswordResetTypeHandlerInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class PasswordResetTypeHandler implements PasswordResetTypeHandlerInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @var User
     */
    private $userTrick;

    /**
     * @var EncoderFactoryInterface
     */
    private $encoderFactory;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        ValidatorInterface       $validator,
        UsersRepositoryInterface $repository,
        EncoderFactoryInterface  $encoderFactory
)
    {
        $this->validator     = $validator;
        $this->repository    = $repository;
        $this->encoderFactory = $encoderFactory;
    }


    /**
     * {@inheritdoc}
     */
    public function handle(FormInterface $form, $user)
    {
        if( $form->isSubmitted() && $form->isValid()) {

            if( $form->getData()->newpassword === $form->getData()->checknewpassword ) {

                $constraints = $this->validator->validate($user, [], ['User']);

                        if (\count($constraints) > 0) {
                            return false;
                        }

                        // Generating new encoded password
                $encoder = $this->encoderFactory->getEncoder(User::class);
                $form->getData()->newpassword = $encoder->encodePassword($form->getData()->newpassword, null);

                $user->changePassword($form->getData()->newpassword);

                // Destroy token in User
                $user->deleteToken();
                $this->repository->saveUser($user);

                return true;
            }

            return true;
        }

        return false;
    }
}