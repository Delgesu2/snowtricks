<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/09/18
 * Time: 21:33
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\UserListResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class UserListResponder implements UserListResponderInterface
{
    /**
     * @inheritdoc
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritdoc
     */
    public function __invoke($users)
    {
        return new Response(
            $this->twig->render('users.html.twig', [
                'users' => $users
                ])
        );
    }
}