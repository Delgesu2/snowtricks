<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/08/18
 * Time: 19:41
 */

namespace App\Helper;


use App\Domain\Entity\Interfaces\PhotoInterface;
use App\Helper\Interfaces\OneFileUploaderHelperInterface;
use Psr\Log\LoggerInterface;

class OneFileUploaderHelper implements OneFileUploaderHelperInterface
{
    /**
     * @var string
     */
    private $pictDir;

    private $publicFolder;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @inheritdoc
     */
    public function __construct(
        string $pictDir,
        string $publicFolder,
        LoggerInterface $logger)
    {
        $this->pictDir      = $pictDir;
        $this->publicFolder = $publicFolder;
        $this->logger       = $logger;
    }

    /**
     * @inheritdoc
     */
    public function upload(\SplFileInfo $splFileInfo, PhotoInterface $photo): bool
    {
        try {
            $splFileInfo->move($this->publicFolder . $this->pictDir, $photo->getTitle());

        } catch (\RuntimeException $exception) {

            $this->logger->error(sprintf('Le fichier n\'a pas pu être chargé', $splFileInfo->getBasename()));

            return false;
        }

        $this->logger->info(sprintf('Un nouveau fichier a été chargé, filename %s', $photo->getTitle()));

        $photo->upload($this->publicFolder);

        return true;
    }

}