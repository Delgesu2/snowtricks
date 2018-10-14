<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 14/10/18
 * Time: 00:00
 */

namespace App\Form\Handler\Security\Interfaces;


use App\Domain\Entity\Interfaces\UserTrickInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Interface EmailCheckHandlerInterface
 *
 * @package App\Form\Handler\Security\Interfaces
 */
interface EmailCheckHandlerInterface
{
    /**
     * @param FormInterface $form
     * @param UserTrickInterface $user
     *
     * @return mixed
     */
    public function handle(FormInterface $form);

}