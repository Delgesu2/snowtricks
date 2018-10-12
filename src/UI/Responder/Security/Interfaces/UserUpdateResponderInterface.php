<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/10/18
 * Time: 22:00
 */

namespace App\UI\Responder\Security\Interfaces;


use Twig\Environment;

interface UserUpdateResponderInterface
{
    /**
     * UserUpdateResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $form
     * @param $user
     *
     * @return mixed
     */
    public function __invoke($form);
}