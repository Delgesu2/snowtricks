<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 18/08/18
 * Time: 19:46
 */

namespace App\Helper;

use App\Domain\Entity\Interfaces\VideoInterface;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;  // pas utilisé

/**
 * Class DataTransformer
 *
 * @package App\Helper
 */
final class DataTransformer implements DataTransformerInterface
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function transform($video)
    {
       if (\count($video) == 0){
           return [];
       }

       foreach ($video as $entry) {
           $data[] = $entry->getUrl();
       }

       return $data;
    }

    public function reverseTransform($value)
    {
        return $value;
    }
}