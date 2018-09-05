<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 31/08/18
 * Time: 19:42
 */

namespace App\Helper\Interfaces;

use App\Domain\Entity\Interfaces\PhotoInterface;
use Psr\Log\LoggerInterface;

interface OneFileUploaderHelperInterface
{
    /**
     * OneFileUploaderHelperInterface constructor.
     *
     * @param string $pictDir
     * @param string $publicFolder
     * @param LoggerInterface $logger
     */
    public function __construct(
        string $pictDir,
        string $publicFolder,
        LoggerInterface $logger
    );

    /**
     * @param \SplFileInfo $splFileInfo
     *
     * @return bool
     */
    public function upload(\SplFileInfo $splFileInfo, PhotoInterface $photo): bool;
}