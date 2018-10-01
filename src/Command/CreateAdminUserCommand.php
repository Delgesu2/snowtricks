<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 01/10/18
 * Time: 14:47
 */

namespace App\Command;

use App\Domain\Entity\User;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;


class CreateAdminUserCommand extends Command
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;

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

        $this->user = new User(
            $input->getArgument('username'),
            $input->getArgument('nickname'),
            $input->getArgument('password'),
            $input->getArgument('email'),
            'ROLE_ADMIN'
        );

        $output->writeln('Admin successfully generated');

    }

}