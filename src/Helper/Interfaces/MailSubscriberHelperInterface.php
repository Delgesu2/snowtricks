<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 09/09/18
 * Time: 16:45
 */

namespace App\Helper\Interfaces;

use Symfony\Component\Form\FormInterface;
use App\Domain\Entity\Interfaces\UserTrickInterface;
use Twig\Environment;

/**
 * Interface MailSubscriberHelperInterface
 *
 * @package App\Helper\Interfaces
 */
interface MailSubscriberHelperInterface
{
    /**
     * MailSubscriberHelperInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param FormInterface $form
     * @param \Swift_Mailer $swift_Mailer
     * @param UserTrickInterface $user
     *
     * @return mixed
     */
    public function registrationSend(FormInterface $form, \Swift_Mailer $swift_Mailer, UserTrickInterface $user);
}