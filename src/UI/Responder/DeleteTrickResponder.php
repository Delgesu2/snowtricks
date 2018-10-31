<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/10/18
 * Time: 18:46
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\DeleteTrickResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteTrickResponder
 *
 * @package App\UI\Responder
 */
final class DeleteTrickResponder implements DeleteTrickResponderInterface
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
        return new RedirectResponse($this->urlGenerator->generate('trickslist'));
    }

}