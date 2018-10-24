<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/08/18
 * Time: 17:41
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\Interfaces\TricksRepositoryInterface;
use App\UI\Action\Interfaces\DeleteTrickActionInterface;
use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="delete_trick",
 *      path="/delete/{slug}",
 *      requirements={"slug"="[a-zA-Z0-9-]+"})
 */
final class DeleteTrickAction implements DeleteTrickActionInterface
{
    /**
     * @var TricksRepositoryInterface
     */
    private $repository;

    /**
     * @var Filesystem
     */
    private $filesystem;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        TricksRepositoryInterface $repository,
        Filesystem                $filesystem
)
    {
        $this->repository = $repository;
        $this->filesystem = $filesystem;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke(
        HomeResponderInterface $responder,
        Request $request
    )
    {
        $trick = $this->repository->getOneTrick($request->get('slug'));

        // delete file from database
        if (!\is_null($trick->getPhoto())) {

            $this->filesystem->remove($trick->getPhoto()->getPath());   // tableau !! Voir documentation de la méthode

        }

        // delete object
        $this->repository->deleteTrick($trick);

        // Get all users for Homepage
        $tricks = $this->repository->getAllTricks();

        return $responder($tricks);
    }

}