<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 10/06/18
 * Time: 21:12
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\CreateTrickResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CreateTrickResponder implements CreateTrickResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke(FormInterface $createTrickType)
    {
        return new Response(
            $this->twig->render('createTrick.html.twig', [
                'form' => $createTrickType->createView()
            ])
        );
    }
}
