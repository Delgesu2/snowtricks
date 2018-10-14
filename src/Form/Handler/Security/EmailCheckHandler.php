<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 13/10/18
 * Time: 23:59
 */

namespace App\Form\Handler\Security;

use App\Domain\Entity\Interfaces\UserTrickInterface;
use App\Form\Handler\Security\Interfaces\EmailCheckHandlerInterface;
use App\Helper\Interfaces\MailSubscriberHelperInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class EmailCheckHandler
 *
 * @package App\Form\Handler\Security
 */
final class EmailCheckHandler implements EmailCheckHandlerInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * @var UsersRepositoryInterface
     */
    private $repository;

    /**
     * @var \Swift_Mailer
     */
    private $swift_Mailer;

    /**
     * @var MailSubscriberHelperInterface
     */
    private $mailer;


    /**
     * EmailCheckHandler constructor.
     *
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param UsersRepositoryInterface $repository
     * @param \Swift_Mailer $swift_Mailer
     * @param MailSubscriberHelperInterface $mailer
     */
    public function __construct(
        SessionInterface              $session,
        ValidatorInterface            $validator,
        UsersRepositoryInterface      $repository,
        \Swift_Mailer                 $swift_Mailer,
        MailSubscriberHelperInterface $mailer
    )
    {
        $this->session      = $session;
        $this->validator    = $validator;
        $this->repository   = $repository;
        $this->swift_Mailer = $swift_Mailer;
        $this->mailer       = $mailer;
    }


    /**
     * {@inheritdoc}
     */
    public function handle(
        FormInterface $form
    ) :bool
    {
        if ($form->isSubmitted() && $form->isValid() ) {

            $users = $this->repository->getAllUsers();

            foreach ($users as $user)

                if ( $user->getEmail() === $form->getData()->email ) {

                    $this->mailer->emailCheckSend($form, $this->swift_Mailer, $user);

                }

            return false;
        }

        return false;
    }

}