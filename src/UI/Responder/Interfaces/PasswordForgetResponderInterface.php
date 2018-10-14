<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 00:06
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface PasswordForgetResponderInterface
{
    /**
     * PasswordForgetResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment           $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param Request $request
     * @param bool $redirest
     * @param FormInterface|null $form
     *
     * @return Response
     */
    public function __invoke(
        Request       $request,
        $redirect = false,
        FormInterface $form
    ): Response;
}