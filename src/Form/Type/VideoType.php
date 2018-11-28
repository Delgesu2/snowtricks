<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 03/08/18
 * Time: 17:05
 */

namespace App\Form\Type;

use App\Domain\Entity\Video;
use function Sodium\add;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;


/**
 * Class UpdateTrickType
 *
 * @package App\Form\Type
 */
class VideoType extends AbstractType
{
    /**
     * @inheritdoc
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('url', TextType::class, [
                'label_attr'    => ['class' => 'label'],
                'attr'          => ['class' => 'input']
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class
        ]);
    }
}
