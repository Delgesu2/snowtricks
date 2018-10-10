<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 22:01
 */

namespace App\UI\Action\Security\Interfaces;


use App\Domain\DTO\DTOBuilder;
use App\Form\Handler\Security\Interfaces\UserUpdateHandlerInterface;
use App\Helper\FileUploaderHelper;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

interface UserUpdateActionInterface
{
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelper $fileUploaderHelper,
        UserUpdateHandlerInterface $userUpdateHandler,
        UsersRepositoryInterface $repository,
        DTOBuilder $DTOBuilder,
        TokenStorageInterface   $tokenStorage
    );
}