<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/09/18
 * Time: 17:08
 */

namespace App\UI\Responder\Security\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interface UserConnectionResponderInterface
 *
 * @package App\UI\Responder\Security\Interfaces
 */
interface UserConnectionResponderInterface
{
    /**
     * UserConnectionResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        Environment           $twig,
        UrlGeneratorInterface $urlGenerator
    );

    /**
     * @param bool $redirect
     * @param FormInterface $form
     *
     * @return Response
     */
    public function __invoke(FormInterface $form): Response;
}