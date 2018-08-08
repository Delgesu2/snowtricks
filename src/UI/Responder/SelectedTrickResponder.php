<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class SelectedTrickResponder implements SelectedTrickResponderInterface
{
    private $twig;

    /**
     * SelectedTrickResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param $trick
     *
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($trick)
    {
        return new Response(
            $this->twig->render('selected_trick.html.twig', [
                'oneTrick' => $trick
            ])
        );
    }
}