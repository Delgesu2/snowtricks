<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 15/06/18
 * Time: 19:10
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface CreateTrickResponderInterface
{
    /**
     * CreateTrickResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param bool $redirect
     * @param FormInterface|null $createTrickType
     *
     * @return HttpResponse
     */
    public function __invoke(
        $redirect = false,
        FormInterface $createTrickType = null
    ): HttpResponse;
}
