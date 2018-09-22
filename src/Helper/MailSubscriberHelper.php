<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 05/09/18
 * Time: 13:06
 */

namespace App\Helper;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Helper\Interfaces\MailSubscriberHelperInterface;
use Symfony\Component\Form\FormInterface;
use Twig\Environment;

/**
 * Class MailSubscriberHelper
 *
 * @package App\Helper
 */
final class MailSubscriberHelper implements MailSubscriberHelperInterface
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
    public function registrationSend(FormInterface $form, \Swift_Mailer $swift_Mailer, UserTrickInterface $user)
    {
       $message = (new \Swift_Message('Bienvenue sur Snowtricks'))
           ->setFrom('contact@devxdemo.eu')
           ->setTo($form->getData()->email)
           ->setSubject('Création de votre compte Snowtricks')
           ->setBody(
               $this->twig->render(
                   'email/registration.html.twig',
                   array('name'=>$user->getName(),
                         'token'=>$user->getToken()
                       )
               ),
               'text/html'
           );

       $swift_Mailer->send($message);
    }
}
