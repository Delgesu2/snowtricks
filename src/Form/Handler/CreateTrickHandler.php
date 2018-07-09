<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
USE Symfony\Component\HttpFoundation\Session\Session;
use App\Entity\Trick;

$session = new Session();
$session->start();

class CreateTrickHandler
{
    public function handle(FormInterface $form, UploadedFile $load) :bool
    {
        $trick = new Trick();

        if ($form->isSubmitted() && $form->isValid()) {

            $file = $trick->getPhoto();

            $filename = $this->generateUniqueFileName().'.'.$load->guessExtension();

            // move file to /tricks directory
            $load->move(
                $this->getParameter('%kernel.root_dir%/public/images/tricks'),
                $filename
            );

            // succes flash message
            $session->getFlashBag()->add(
                'Nouveau trick enregistré. Bravo ! Retour à la page d\'accueil'
            );
            return true;
        }
            return false;
    }

    /**
     * @return string
     */
    private function generateUniqueFilename() {
        return md5(uniqid());
    }
}