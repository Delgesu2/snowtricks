<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/09/18
 * Time: 17:02
 */

namespace App\UI\Responder\Security;

use App\UI\Responder\Security\Interfaces\UserConnectionResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class UserConnectionResponder implements UserConnectionResponderInterface
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
        Environment           $twig,
        UrlGeneratorInterface $urlGenerator
    )
    {
        $this->twig         = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke(
        FormInterface $form
    ): Response {

       return new Response(
                  $this->twig->render('security/user_connection.html.twig', [
                      'form' => $form->createView()
                  ])
              );
    }
}