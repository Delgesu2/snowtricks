<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 22/09/18
 * Time: 18:31
 */

namespace App\UI\Responder\Security\Interfaces;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface UserRegistrationCheckResponder
 *
 * @package App\UI\Responder\Security\Interfaces
 */
interface UserRegistrationCheckResponder
{
    /**
     * UserRegistrationCheckResponder constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator);

    /**
     * @return mixed
     */
    public function __invoke();
}