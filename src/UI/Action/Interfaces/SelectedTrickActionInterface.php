<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 06:09
 */

namespace App\UI\Action\Interfaces;

use App\Form\Handler\Interfaces\CommentHandlerInterface;
use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Interface SelectedTrickActionInterface
 *
 * @package App\UI\Action\Interfaces
 */
interface SelectedTrickActionInterface
{
    /**
     * SelectedTrickActionInterface constructor.
     *
     * @param TricksRepositoryInterface $repository
     * @param FormFactoryInterface $formFactory
     * @param CommentHandlerInterface $handler
     */
    public function __construct(
        TricksRepositoryInterface $repository,
        FormFactoryInterface      $formFactory,
        CommentHandlerInterface   $handler
);

    /**
     * @param Request $request
     * @param SelectedTrickResponderInterface $responder
     * @param $slug
     *
     * @return mixed
     */
    public function __invoke(
        Request $request,
        SelectedTrickResponderInterface $responder,
        $slug
    );
}