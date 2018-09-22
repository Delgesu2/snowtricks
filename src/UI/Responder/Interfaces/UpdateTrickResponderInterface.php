<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 19:04
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Interface UpdateTrickResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface UpdateTrickResponderInterface
{
    /**
     * UpdateTrickResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $twig
     *
     * @return mixed|Response
     */
    public function __invoke($twig);
}