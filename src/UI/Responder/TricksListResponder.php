<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 17:01
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\TricksListResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class TricksListResponder implements TricksListResponderInterface
{
    private $twig;

    /**
     * @inheritdoc
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $tricks
     *
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($tricks)
    {
        return new Response(
            $this->twig->render('tricks.html.twig', [
                'tricks' => $tricks
            ])
        );
    }
}