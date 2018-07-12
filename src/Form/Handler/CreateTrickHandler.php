<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use App\Entity\Trick;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CreateTrickHandler implements CreateTrickHandlerInterface
{
    private $pictDir;
    private $uploaderHelper;
    private $session;
    private $request;

    public function __construct(string $pictDir, SessionInterface $session, Request $request)
    {
        $this->pictDir = $pictDir;
        $this->session = $session;
        $this->request = $request;
        $this->uploaderHelper = $uploaderHelper;
    }

    public function flash($request){
        $this->$request->addFlash(
            'Nouveau trick enregistré. Bravo ! Retour à la page d\'accueil'
        );
    }

    public function handle(FormInterface $form) :bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($form->getData()->photo as $photo) {
                $filename = $this->generateUniqueFileName() . '.' . $photo->guessExtension();

                // move file to /tricks directory
                $photo->move(
                    $this->pictDir,$filename
                );
            }
            // succes flash message
          $this->flash($this->request);
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