<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 05/09/18
 * Time: 13:06
 */

namespace App\Helper;


class MailHelper
{
    public function __invoke()
    {
        // Generate token
        $token = uniqid(rand(), true);

        // Get mailer information
        $data = __DIR__ . './../../config/mailer/mailer.php';

        // Create the Transport
        $transport = (new \Swift_SmtpTransport($data['smtp'], 465, 'ssl'))
            ->setUsername($data['username'])
            ->setPassword($data['password'])
            ;

        // Create the Mailer
        $mailer = new \Swift_Mailer($transport);

        // Create a message
        $contact = 'Bienvenue sur Snowtricks, le site des fous de la glisse ! Confirmez votre inscription en cliquant
        sur le lien suivant:'.'<a href="http://127.0.0.1:8000/register?token=' . $token . ' ">Cliquez ici !
        </a></br>';
        $message = (new \Swift_Message('Inscription sur Snowtricks'))
            ->setFrom([$data['from'] => 'Snowtricks'])
            ->setTo($data['to'])
            ->setSubject('Création de votre compte')
            ->setBody($contact, 'text/html');




    }

}