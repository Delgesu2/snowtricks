<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/08/18
 * Time: 22:23
 */

namespace App\UI\Responder;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UpdateTrickResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($trick)
    {
        return new Response(
            $this->twig->render('updateTrick.html.twig', [
                'oneTrick' => $trick
            ])
        );
    }
}