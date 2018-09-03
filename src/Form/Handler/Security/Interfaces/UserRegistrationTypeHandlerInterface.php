<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:09
 */

namespace App\Form\Handler\Security\Interfaces;


use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;
use App\Helper\Interfaces\OneFileUploaderHelperInterface;
use App\Domain\Factory\Interfaces\PhotoFactoryInterface;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;

interface UserRegistrationTypeHandlerInterface
{

    /**
     * @param FormInterface $form
     *
     * @return bool
     */
    public function handle(FormInterface $form): bool;

    /**
     * UserRegistrationTypeHandlerInterface constructor.
     *
     * @param EncoderFactoryInterface $encoderFactory
     * @param OneFileUploaderHelperInterface $fileUploaderHelper
     * @param PhotoFactoryInterface $photoFactory
     * @param UserFactoryInterface $userFactory
     * @param UsersRepositoryInterface $usersRepository
     */
    public function __construct(
        EncoderFactoryInterface        $encoderFactory,
        OneFileUploaderHelperInterface $fileUploaderHelper,
        PhotoFactoryInterface          $photoFactory,
        UserFactoryInterface           $userFactory,
        UsersRepositoryInterface       $usersRepository
    );
}