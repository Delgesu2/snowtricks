<?php

namespace App\DataFixtures;

use App\Domain\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
        // USER
        $user1 = new User('Paul', 'Polo', 'xxxxx', 'paul@recon.com', 'online',
            'member');
        $this->addReference('polo', $user1);
        $manager->persist($user1);

        $user2 = new User('Mouloud', 'SamFisher', 'xyzab', 'samfisher@wildlands.com',
            'offline', 'member');
        $this->addReference('mouloud', $user2);
        $manager->persist($user2);

        $user3 = new User('John', 'Mitchell', 'xxxxx', 'scott.mitchell@graw.net', 'online',
            'admin');
        $this->addReference('john', $user3);
        $manager->persist($user3);

        $user4 = new User('Eusebius', 'sorceller', 'xcvbn', 'witcher@poland.com', 'offline',
            'superuser');
        $this->addReference('eusebius', $user4);
        $manager->persist($user4);

        $manager->flush();

    }
}