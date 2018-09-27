<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 12/09/18
 * Time: 17:30
 */

namespace App\UI\Responder\Security;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class UserRegistrationCheckResponder
 *
 * @package App\UI\Responder\Security
 */
final class UserRegistrationCheckResponder
{
    /**
     * @var UrlGeneratorInterface
     */
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
        return new RedirectResponse($this->urlGenerator->generate('home'));
    }
}