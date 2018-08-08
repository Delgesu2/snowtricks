<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 13:27
 */

namespace App\UI\Responder\Interfaces;


use Twig\Environment;

interface SelectedTrickResponderInterface
{
    /**
     * SelectedTrickResponderInterface constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $trick
     *
     * @return mixed
     */
    public function __invoke($trick);
}