<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 30/10/18
 * Time: 16:06
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Interface DeleteCommentResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface DeleteCommentResponderInterface
{
    /**
     * DeleteCommentResponderInterface constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(UrlGeneratorInterface $urlGenerator);

    /**
     * @return RedirectResponse
     */
    public function __invoke($request);
}