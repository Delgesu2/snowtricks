<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 30/10/18
 * Time: 16:06
 */

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\DeleteCommentResponderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

/**
 * Class DeleteCommentResponder
 *
 * @package App\UI\Responder
 */
final class DeleteCommentResponder implements DeleteCommentResponderInterface
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
    public function __invoke($request)
    {
        return new RedirectResponse($this->urlGenerator->generate('selected_trick', ['slug' => $request->attributes->get('trick')]));
    }
}