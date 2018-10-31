<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\SelectedTrickResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class SelectedTrickResponder
 *
 * @package App\UI\Responder
 */
final class SelectedTrickResponder implements SelectedTrickResponderInterface
{
    private $twig;

    /**
     * {@inheritdoc}
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * {@inheritdoc}
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function __invoke(
        $trick,
        FormInterface $form
    ): Response {

        return new Response(
            $this->twig->render('selected_trick.html.twig', [
                'oneTrick' => $trick,
                'form'     => $form->createView()
            ])
        );
    }
}