<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 21:06
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\CreateResponder;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route(name="create", path="/create")
 */
class CreateAction
{
    private $repository;

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateResponder $responder)
    {

    }
}