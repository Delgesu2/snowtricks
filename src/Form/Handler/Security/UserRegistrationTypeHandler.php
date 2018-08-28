<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 27/08/18
 * Time: 20:08
 */

namespace App\Form\Handler\Security;

use App\Form\Handler\Security\Interfaces\UserRegistrationTypeHandlerInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class UserRegistrationTypeHandler
 *
 * @author Xavier Coutant
 */
final class UserRegistrationTypeHandler implements UserRegistrationTypeHandlerInterface
{
    /**
     * @inheritdoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            return true;
        }

        return false;
    }
}