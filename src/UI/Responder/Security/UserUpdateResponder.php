<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/10/18
 * Time: 22:15
 */

namespace App\UI\Responder\Security;


use App\UI\Responder\Security\Interfaces\UserUpdateResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Class UserUpdateResponder
 *
 * @package App\UI\Responder\Security
 */
final class UserUpdateResponder implements UserUpdateResponderInterface
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
    public function __invoke(FormInterface $form)
    {
        return new Response(
                    $this->twig->render('security/update_user.html.twig', [
                        'form' => $form->createView()
                    ])
        );

    }
}
