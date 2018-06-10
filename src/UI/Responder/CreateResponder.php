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

class CreateResponder
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        return new Response(
            $this->twig->render('create.html.twig')
        );
    }
}