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
    private $repository;

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
     * @inheritdoc
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        DeleteUserResponderInterface $responder,
        Request $request
    )
    {
        $user = $this->repository->getUserBySlug($request->get('slug'));

        if (!\is_null($user->getPhoto())) {

            $this->filesystem->remove($user->getPhoto()->getPath());

        }

        $this->repository->deleteUser($user);

        return $responder();
    }

}