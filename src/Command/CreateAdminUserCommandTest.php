<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 01/10/18
 * Time: 18:37
 */

namespace App\Command;

use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class CreateAdminUserCommandTest extends KernelTestCase
{
    public function testExecute()
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $application->add(new CreateAdminUserCommand());

        $command = $application->find('app::create-admin');
        $commandTester = new CommandTester($command);
        $commandTester->execute(array(
            'command' => $command->getName(),

            'username' => 'Xavier',
            'nickname' => 'xav',
            'password' => 'Pisci2010netta',
            'email'    => 'xavierus70@hotmail.com'
        ));

        $output = $commandTester->getDisplay();
        $this->assertContains('Username: Xavier', $output);
    }
}
