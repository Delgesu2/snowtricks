<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 01/10/18
 * Time: 14:47
 */

namespace App\Command;

use App\Domain\Entity\User;
use App\Domain\Factory\Interfaces\UserFactoryInterface;
use App\Infra\Doctrine\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Security\Core\Encoder\EncoderFactoryInterface;

class CreateAdminUserCommand extends Command
{
    private $repository;

    private $userFactory;

    private $encoderFactory;

    public function __construct(
        UsersRepositoryInterface $repository,
        UserFactoryInterface     $userFactory,
        EncoderFactoryInterface  $encoderFactory
    )
    {
        $this->repository     = $repository;
        $this->userFactory    = $userFactory;
        $this->encoderFactory = $encoderFactory;


        parent::__construct();
    }

    protected function configure()
    {
        $this

            // command name (after "bin/console")
            ->setName('app:create-admin')

            // shown while running "php bin/console list"
            ->setDescription('Creates a new admin-user.')

            // full description when running the command with "--help" option
            ->setHelp('This command allows you to create an admin-user with all priviledges.')

            ->addArgument('username', InputArgument::REQUIRED, 'Username of the user')

            ->addArgument('nickname', InputArgument::REQUIRED, 'Nickname')

            ->addArgument('password', InputArgument::REQUIRED,'Connection password')

            ->addArgument('email', InputArgument::REQUIRED, 'Email')
        ;
    }



    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Admin Creator',
            '=============',
            ''
        ]);

        $output->writeln('You are about to create an admin-user.');

        $output->writeln('Username: ' .$input->getArgument('username'));

        $output->writeln('Nickname' .$input->getArgument('nickname'));

        $output->writeln('Password: ' .$input->getArgument('password'));

        $output->writeln('Email: ' .$input->getArgument('email'));

        $output->writeln('Role: ROLE_ADMIN');


        $newPassword = $this->encoderFactory->getEncoder(User::class)
                            ->encodePassword($input->getArgument('password'), null);

            $user = new User(
            $input->getArgument('username'),
            $input->getArgument('nickname'),
            $newPassword,
            $input->getArgument('email'),
            true,
            ['ROLE_ADMIN']
        );
            $this->repository->saveUser($user);

        $output->writeln('Admin successfully generated');

    }

}