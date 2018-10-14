<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 00:06
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\PasswordForgetResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class PasswordForgetResponder
 *
 * @package App\UI\Responder
 */
final class PasswordForgetResponder implements PasswordForgetResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        Environment           $twig,
        UrlGeneratorInterface $urlGenerator
    )
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        Request       $request,
        $redirect = false,
        FormInterface $form
): Response {

        $redirect
            ? $response = new RedirectResponse($this->urlGenerator->generate('home'))
            : $response = new Response(
            $this->twig->render('security/email_check.html.twig', [
                'form' => $form->createView()
            ])
        );

        return $response;
    }

}