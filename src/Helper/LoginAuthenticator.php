<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 26/09/18
 * Time: 17:28
 */

namespace App\Helper;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\PasswordEncoderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Guard\AbstractGuardAuthenticator;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;

class LoginAuthenticator extends AbstractFormLoginAuthenticator
{
    private $urlGenerator;

    private $passwordEncoder;

    public function __construct(
        UrlGeneratorInterface        $urlGenerator,
        UserPasswordEncoderInterface $passwordEncoder
)
    {
        $this->urlGenerator    = $urlGenerator;
        $this->passwordEncoder = $passwordEncoder;
    }

    protected function getLoginUrl()
    {
        return $this->urlGenerator->generate('user_connection');
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    public function supports(Request $request)
    {
        if ($request->getPathInfo() !== $this->urlGenerator->generate('user_connection') ||
        'POST' !== $request->getMethod()) {

            return false;
        }

        return true;
    }

    /**
     * @param Request $request
     *
     * @return array|mixed
     */
    public function getCredentials(Request $request)
    {
         if (!$request->request->get('user_connection')['name'] &&
             !$request->request->get('user_connection')['password']) {

             return null;
         }

         return [
             'username'=>$request->request->get('user_connection')['name'],
             'password'=>$request->request->get('user_connection')['password']
                ];
    }

    /**
     * @param mixed $credentials
     * @param UserProviderInterface $userProvider
     *
     * @return null|\Symfony\Component\Security\Core\User\UserInterface|void
     */
    public function getUser($credentials, UserProviderInterface $userProvider)
    {
        return $userProvider->loadUserByUsername($credentials['username']);
    }


    public function checkCredentials($credentials, UserInterface $user)
    {
        return $this->passwordEncoder->isPasswordValid($user, $credentials['password']);
    }

    /**
     * @param Request $request
     * @param TokenInterface $token
     * @param string $providerKey
     *
     * @return null|\Symfony\Component\HttpFoundation\Response
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey)
    {
        return new RedirectResponse($this->urlGenerator->generate('home'));
    }

    /**
     * @param Request $request
     * @param AuthenticationException $exception
     *
     * @return null|Response
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception)
    {
        return new RedirectResponse($this->urlGenerator->generate('user_connection'));
    }

    /**
     * @return bool
     */
    public function supportsRememberMe()
    {
        return true;
    }
}
