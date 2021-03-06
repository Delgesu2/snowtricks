<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 05/09/18
 * Time: 14:46
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface DeleteUserResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface DeleteUserResponderInterface
{
    /**
     * DeleteUserResponderInterface constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator);

    /**
     * @return mixed
     */
    public function __invoke();
}