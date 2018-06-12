<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 21:12
 */

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CreateTrickResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($groups)
    {
        return new Response(
            $this->twig->render('create.html.twig', [
                'groups'=> $groups
            ])
        );
    }
}
