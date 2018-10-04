<?php

namespace App\UI\Action\Security;

use App\Domain\DTO\DTOBuilder;
use App\Domain\DTO\Interfaces\DTOBuilderInterface;
use App\Form\Handler\Security\Interfaces\UserUpdateHandlerInterface;
use App\Form\Handler\Security\UserUpdateHandler;
use App\Form\Type\Security\UpdateUserType;
use App\Helper\FileUploaderHelper;
use App\Helper\Interfaces\FileUploaderHelperInterface;
use App\Infra\Doctrine\Repository\UsersRepository;
use App\UI\Action\Security\Interfaces\UserUpdateActionInterface;
use App\UI\Responder\Security\Interfaces\UserUpdateResponderInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

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
     * @var UsersRepository
     */
    private $repository;

    /**
     * @var DTOBuilder
     */
    private $DTOBuilder;

    /**
     * UserUpdateAction constructor.
     *
     * {@inheritdoc}
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        EventDispatcherInterface $eventDispatcher,
        FileUploaderHelper $fileUploaderHelper,
        UserUpdateHandlerInterface $userUpdateHandler,
        UsersRepository $repository,
        DTOBuilder $DTOBuilder
    ) {
        $this->formFactory        = $formFactory;
        $this->eventDispatcher    = $eventDispatcher;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->userUpdateHandler  = $userUpdateHandler;
        $this->repository         = $repository;
        $this->DTOBuilder         = $DTOBuilder;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function __invoke(
        Request                      $request,
        UserUpdateResponderInterface $responder
    )
    {
        $user = $this->repository->getOneUser($request->attributes->get('user'));

        $dto = $this->DTOBuilder->hydrateUserDTO($user);

        $updateUserType = $this->formFactory->create(UpdateUserType::class, $dto)
            ->handleRequest($request);

        if ($this->userUpdateHandler->handle($updateUserType, $user)){
            return $responder(true);
        }

        return $responder($updateUserType);
    }
}