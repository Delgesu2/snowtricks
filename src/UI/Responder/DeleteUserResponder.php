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

/**
 * Class DeleteUserResponder
 *
 * @package App\UI\Responder
 */
final class DeleteUserResponder implements DeleteUserResponderInterface
{
    private $urlGenerator;

    /**
     * {@inheritdoc}
     */
    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * {@inheritdoc}
     */
    public function __invoke()
    {
        return new RedirectResponse($this->urlGenerator->generate('userlist'));
    }
}