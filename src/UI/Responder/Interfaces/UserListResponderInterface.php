<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/09/18
 * Time: 21:36
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Interface UserListResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface UserListResponderInterface
{
    /**
     * UserListResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $users
     * @return mixed|Response
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke($users);
}
