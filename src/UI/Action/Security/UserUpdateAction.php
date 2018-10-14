<?php

namespace App\UI\Action\Security;

use App\Domain\DTO\DTOBuilder;
use App\Form\Handler\Security\Interfaces\UserUpdateHandlerInterface;
use App\Form\Type\Security\UpdateUserType;
use App\Helper\FileUploaderHelper;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Action\Security\Interfaces\UserUpdateActionInterface;
use App\UI\Responder\Security\Interfaces\UserUpdateResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="user_update",
 *        path="/userupdate"
 *       )
 */
final class UserUpdateAction implements UserUpdateActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var EventDispatcherInterface
     */
    private $eventDispatcher;

    /**
     * @var FileUploaderHelper
     */
    private $fileUploaderHelper;

    /**
     * @var UserUpdateHandlerInterface
     */
    private $userUpdateHandler;

    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @var DTOBuilder
     */
    private $DTOBuilder;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;


    /**
     * UserUpdateAction constructor.
     *
     * {@inheritdoc}
     */
    public function __construct(
        FormFactoryInterface        $formFactory,
        EventDispatcherInterface    $eventDispatcher,
        FileUploaderHelper          $fileUploaderHelper,
        UserUpdateHandlerInterface  $userUpdateHandler,
        UsersRepositoryInterface    $repository,
        DTOBuilder                  $DTOBuilder,
        TokenStorageInterface       $tokenStorage
    ) {
        $this->formFactory        = $formFactory;
        $this->eventDispatcher    = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->userUpdateHandler  = $userUpdateHandler;
        $this->repository         = $repository;
        $this->DTOBuilder         = $DTOBuilder;
        $this->tokenStorage       = $tokenStorage;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\ORMException
     */
    public function __invoke(
        Request                      $request,
        UserUpdateResponderInterface $responder
    )
    {
        $user = $this->tokenStorage->getToken()->getUser();

        $dto = $this->DTOBuilder->hydrateUserDTO($user);

        $updateUserType = $this->formFactory->create(UpdateUserType::class, $dto)
            ->handleRequest($request);

        if ($this->userUpdateHandler->handle($updateUserType, $user)) {
            //return $responder(true);
            return $responder($updateUserType);
        }

        return $responder($updateUserType);
    }
}
