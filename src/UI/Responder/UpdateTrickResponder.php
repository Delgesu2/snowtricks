<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 02/08/18
 * Time: 22:23
 */

namespace App\UI\Responder;


use App\UI\Responder\Interfaces\UpdateTrickResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
 * Class UpdateTrickResponder
 *
 * @package App\UI\Responder
 */
final class UpdateTrickResponder implements UpdateTrickResponderInterface
{
    /**
     * @var Environment
     */
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
    public function __invoke(FormInterface $form)
    {
        return new Response(
            $this->twig->render('updateTrick.html.twig', [
                'form' => $form->createView()
            ])
        );
    }
}
