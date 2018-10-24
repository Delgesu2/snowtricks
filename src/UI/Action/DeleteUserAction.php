<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/09/18
 * Time: 17:07
 */

namespace App\UI\Action;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use App\UI\Action\Interfaces\DeleteUserActionInterface;
use App\UI\Responder\Interfaces\DeleteUserResponderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="del_user", path="/del_user/{slug}")
 */
final class DeleteUserAction implements DeleteUserActionInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * @inheritdoc
     */
    public function __construct(
        UsersRepositoryInterface $repository,
        Filesystem               $filesystem
    )
    {
        $this->repository = $repository;
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        DeleteUserResponderInterface $responder,
        Request $request
    )
    {
        $user = $this->repository->getUserBySlug($request->get('slug'));

        // delete file from database
        if (!\is_null($user->getPhoto())) {

            $this->filesystem->remove($user->getPhoto()->getPath());

        }

        // delete object
        $this->repository->deleteUser($user);

        return $responder();
    }

}