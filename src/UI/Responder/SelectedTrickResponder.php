<?php

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class SelectedTrickResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($trick)
    {
        return new Response(
            $this->twig->render('selected_trick.html.twig', [
                'oneTrick' => $trick
            ])
        );
    }
}