<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 17:01
 */

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class TricksListResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($tricks)
    {
        return new Response(
            $this->twig->render('tricks.html.twig', [
                'tricks' => $tricks
            ])
        );
    }
}