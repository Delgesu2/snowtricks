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
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class CreateTrickResponder implements CreateTrickResponderInterface
{
    private $twig;
    private $urlGenerator;

    /**
     * CreateTrickResponder constructor.
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    ) {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @param bool $redirect
     * @param FormInterface|null $createTrickType
     *
     * @return Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($redirect = false, FormInterface $createTrickType = null) :Response
    {
        $redirect
            ? $response = new RedirectResponse($this->urlGenerator->generate('home')) // redirects to homepage
            : $response = new Response(
            $this->twig->render('createTrick.html.twig', [
                'form' => $createTrickType->createView()
            ]));

        return $response;
    }
}
