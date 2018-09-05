<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 05/09/18
 * Time: 14:48
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\DeleteUserResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class DeleteUserResponder implements DeleteUserResponderInterface
{
    private $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    public function __invoke()
    {
        return new RedirectResponse($this->urlGenerator->generate('userlist'));
    }
}