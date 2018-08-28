<?php

namespace App\UI\Responder\Security\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interface UserRegistrationResponderInterface
 *
 * @author Xavier Coutant
 */
interface UserRegistrationResponderInterface
{
    /**
     * UserRegistrationResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param Request $request
     * @param bool $redirect
     * @param FormInterface|null $form
     *
     * @return Response
     */
    public function __invoke(
        Request $request,
        $redirect=false,
        FormInterface $form=null
    ): Response;
}