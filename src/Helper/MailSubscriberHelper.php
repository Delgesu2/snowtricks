<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 05/09/18
 * Time: 13:06
 */

namespace App\Helper;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;

class MailSubscriberHelper
{
    public function registrationSend(FormInterface $form, UserTrickInterface $user)
    {
        // Get mailer information
        $data = require __DIR__ . './../../config/mailer/mailer.php';

        // Create the Transport
        $transport = (new \Swift_SmtpTransport($data['smtp'], 465, 'ssl'))
            ->setUsername($data['username'])
            ->setPassword($data['password'])
            ;

        // Create the Mailer
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $text = 'Salut ' . $form->getData()->name . ' ! Bienvenue sur Snowtricks, le site des fous de la glisse ! 
        Confirmez votre inscription en cliquant sur le lien suivant:'.'<a href="http://127.0.0.1:8000/register?token='
            . $user->getToken() . ' ">Cliquez ici !
        </a></br>';
        $message = (new \Swift_Message('Inscription sur Snowtricks'))
            ->setFrom([$data['from'] => 'Snowtricks'])
            ->setTo($form->getData()->email)
            ->setSubject('Création de votre compte Snowtricks')
            ->setBody($text, 'text/html');

        // Send the message
        $result = $mailer->send($message);
    }
}
