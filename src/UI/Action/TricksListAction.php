<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 16:51
 */

namespace App\UI\Action;

use App\Infra\Doctrine\Repository\TricksRepository;
use App\UI\Responder\HomeResponder;
use App\UI\Responder\TricksListResponder;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route(name="trickslist", path="/list")
*/
class TricksListAction
{
    private $repository;

    public function __construct(TricksRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(TricksListResponder $responder)
    {
        $tricks = $this->repository->getAllTricks();

        return $responder($tricks);
    }
}