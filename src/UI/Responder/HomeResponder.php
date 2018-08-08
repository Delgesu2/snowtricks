<?php

namespace App\UI\Responder;

use App\UI\Responder\Interfaces\HomeResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

/**
* 
*/
final class HomeResponder implements HomeResponderInterface
{
	private $twig;

    /**
     * HomeResponder constructor.
     * @param Environment $twig
     */
	public function __construct(Environment $twig)
	{
		$this->twig = $twig;
	}

    /**
     * @param $tricks
     *
     * @return mixed|Response
     *
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
	public function __invoke($tricks)
	{
		return new Response(
			$this->twig->render('home.html.twig', [
			    'tricks' => $tricks
            ])
		);
	}
}
