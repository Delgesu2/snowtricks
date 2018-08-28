<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 18/08/18
 * Time: 19:46
 */

namespace App\Helper;

use App\Entity\Interfaces\VideoInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;  // pas utilisé

class DataTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->video = $video;
    }

    public function transform($video)
    {
       if (null==$video){
           return '';
       }

       return $video->getId;
    }

    public function reverseTransform($value)
    {
        // TODO: Implement reverseTransform() method.
    }
}