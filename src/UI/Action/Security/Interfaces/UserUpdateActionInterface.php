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
use App\Infra\Doctrine\Repository\UsersRepository;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;

interface UserUpdateActionInterface
{
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelper $fileUploaderHelper,
        UserUpdateHandlerInterface $userUpdateHandler,
        UsersRepository $repository,
        DTOBuilder $DTOBuilder
    );
}