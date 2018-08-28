<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/08/18
 * Time: 22:23
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\UpdateTrickResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class UpdateTrickResponder implements UpdateTrickResponderInterface
{
    private $twig;

    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke($form)
    {
        return new Response(
            $this->twig->render('updateTrick.html.twig', [
                'form' => $form->createView()
            ])
        );
    }
}
