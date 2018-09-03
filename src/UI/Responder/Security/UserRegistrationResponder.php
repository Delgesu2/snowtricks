<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 17:17
 */

namespace App\UI\Responder\Security;

use App\UI\Responder\Security\Interfaces\UserRegistrationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class UserRegistrationResponder
 *
 * @author Xavier Coutant
 */
final class UserRegistrationResponder implements UserRegistrationResponderInterface
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
     * @inheritdoc
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    )
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @inheritdoc
     */
    public function __invoke(
        Request $request,
        $redirect = false,
        FormInterface $form = null
    ): Response {

        $redirect
            ? $response = new RedirectResponse($this->urlGenerator->generate('home'))
            : $response = new Response(
                $this->twig->render('security/user_registration.html.twig', [
                    'form' => $form->createView()
                ])
        );

        return $response;
    }
}