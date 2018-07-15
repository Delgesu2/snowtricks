<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/07/18
 * Time: 11:23
 */

namespace App\Form\Handler;

use App\Entity\Photo;
use App\Entity\Trick;
use App\Infra\Doctrine\Repository\TricksRepository;
use App\Form\Handler\Interfaces\CreateTrickHandlerInterface;
use App\Helper\FileUploaderHelper;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Doctrine\Common\Persistence\ManagerRegistry;

class CreateTrickHandler implements CreateTrickHandlerInterface
{
    private $pictDir;
    private $fileUploaderHelper;
    private $session;
    private $request;
    private $registry;

    /**
     * CreateTrickHandler constructor.
     * @param string $pictDir
     * @param SessionInterface $session
     * @param Request $request
     * @param FileUploaderHelper $fileUploaderHelper
     */
    public function __construct(
        string $pictDir,
        SessionInterface $session,
        Request $request,
        FileUploaderHelper $fileUploaderHelper,
        ManagerRegistry $registry
    ) {
        $this->pictDir = $pictDir;
        $this->session = $session;
        $this->request = $request;
        $this->fileUploaderHelper = $fileUploaderHelper;
        $this->registry = $registry;
    }

    /**
     * @param $request
     * @return mixed|void
     */
    public function flash($request)
    {
        $this->$request->addFlash(
            'Nouveau trick enregistré. Bravo ! Retour à la page d\'accueil'
        );
    }

    /**
     * @param FormInterface $form
     * @param UploadedFile $file
     * @param GenerateFilename $generateFilename
     * @param Trick $trick
     * @return bool
     */
    public function handle(
        FormInterface $form,
        UploadedFile $file,
        GenerateFilename $generateFilename,
        Trick $trick,
        Photo $photo
    ) :bool {

        if ($form->isSubmitted() && $form->isValid()) {

            foreach ($form->getData()->photo as $photo) {

                // create filename for database
                $filename = $generateFilename->generateUniqueFilename() . '.' . $file->guessExtension();

                // set $title
                $title = $trick->getTrick_name();

                // set $alt
                $alt = $title;

                // add $filename and public folder to get $path
                $path = 'images/tricks/' . $filename;

                // create new photo
                $photo = new Photo($title, $path, $alt);

                // persist in BDD
                $repository = new TricksRepository($registry);  // pas sûr de $registry
                $repository->createTrick($trick, $this->registry);  // ??

                // move file to /tricks directory
                $file->move(
                    $this->pictDir,
                    $filename
                );
            }

            // succes flash message
            $this->flash($this->request);

            return true;
        }
            return false;
    }
}