<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/10/18
 * Time: 18:45
 */

namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface DeleteTrickResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface DeleteTrickResponderInterface
{
    /**
     * DeleteTrickResponderInterface constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator);

    /**
     * @return mixed
     */
    public function __invoke();
}