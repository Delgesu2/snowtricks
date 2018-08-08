<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 13:20
 */

namespace App\UI\Responder\Interfaces;


use Twig\Environment;

interface HomeResponderInterface
{
    /**
     * HomeResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $tricks
     *
     * @return mixed
     */
    public function __invoke($tricks);
}