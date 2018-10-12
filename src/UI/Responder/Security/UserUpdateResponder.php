<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/10/18
 * Time: 22:15
 */

namespace App\UI\Responder\Security;


use App\UI\Responder\Security\Interfaces\UserUpdateResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class UserUpdateResponder
 *
 * @package App\UI\Responder\Security
 */
final class UserUpdateResponder implements UserUpdateResponderInterface
{
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
    public function __invoke($form)
    {
        return new Response(
            $this->twig->render('security/update_user.html.twig', [
                'form' => $form->createView()
            ])
        );


    }
}
