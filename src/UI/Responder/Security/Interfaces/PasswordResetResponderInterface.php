<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 22:22
 */

namespace App\UI\Responder\Security\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

/**
 * Interface PasswordResetResponderInterface
 *
 * @package App\UI\Responder\Security\Interfaces
 */
interface PasswordResetResponderInterface
{
    /**
     * PasswordResetResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param FormInterface $form
     *
     * @return Response
     */
    public function __invoke(FormInterface $form): Response;
}