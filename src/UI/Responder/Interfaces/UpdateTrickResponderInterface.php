<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 19:04
 */

namespace App\UI\Responder\Interfaces;


use Twig\Environment;

interface UpdateTrickResponderInterface
{
    public function __construct(Environment $twig);

    public function __invoke($twig);
}