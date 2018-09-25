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
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="del_user", path="/del_user/{slug}")
 */
class DeleteUserAction implements DeleteUserActionInterface
{
    private $repository;

    /**
     * @inheritdoc
     */
    public function __construct(UsersRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @inheritdoc
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(DeleteUserResponderInterface $responder, Request $request)
    {
        $this->repository->deleteUser($request->attributes->get('slug'));


        return $responder();
    }

}