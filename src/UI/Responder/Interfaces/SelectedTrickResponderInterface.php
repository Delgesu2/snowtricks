<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 13:27
 */

namespace App\UI\Responder\Interfaces;

use Symfony\Component\Form\FormInterface;
use Twig\Environment;

/**
 * Interface SelectedTrickResponderInterface
 *
 * @package App\UI\Responder\Interfaces
 */
interface SelectedTrickResponderInterface
{
    /**
     * SelectedTrickResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param $trick
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function __invoke(
        $trick,
        FormInterface $form
    );
}