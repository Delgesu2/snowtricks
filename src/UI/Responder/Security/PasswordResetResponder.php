<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 22:24
 */

namespace App\UI\Responder\Security;

use App\UI\Responder\Security\Interfaces\PasswordResetResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class PasswordResetResponder implements PasswordResetResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * {@inheritdoc}
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(FormInterface $form): Response
    {
        $response = new Response(
            $this->twig->render('security/password_reset.html.twig', [
                'form' => $form->createView()
            ])
        );

        return $response;
    }

}
