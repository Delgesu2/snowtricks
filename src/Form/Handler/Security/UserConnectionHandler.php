<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 20/09/18
 * Time: 18:18
 */

namespace App\Form\Handler\Security;

use App\Form\Handler\Security\Interfaces\UserConnectionHandlerInterface;
use Symfony\Bundle\MakerBundle\Validator;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserConnectionHandler implements UserConnectionHandlerInterface
{
    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * {@inheritdoc}
     */
    public function __construct(
        ValidatorInterface $validator
    )
    {
        $this->validator = $validator;
    }

    /**
     * {@inheritdoc}
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            echo "Salut";
            return true;
        }

        return false;
    }
}