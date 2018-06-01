<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 01/05/18
 * Time: 19:53
 */

namespace App\DataFixtures;

use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PhotoFixtures extends Fixture
{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
        // PHOTO
        $photo1 = new Photo('backflip.jpeg',  'images/tricks/backflip.jpg',
            'backflip');
        $this->addReference('photo1', $photo1);
        $manager->persist($photo1);

        $photo2 = new Photo('backflip2.jpeg',  'images/tricks/backflip2.jpg',
            'backflip2');
        $this->addReference('photo2', $photo2);
        $manager->persist($photo2);

        $photo3 = new Photo('backflip3.jpeg',  'images/tricks/backflip3.jpg',
            'backflip2');
        $this->addReference('photo3', $photo3);
        $manager->persist($photo3);

        $photo4 = new Photo('backflip4.jpeg',  'images/tricks/backflip4.jpg',
            'backflip4');
        $this->addReference('photo4', $photo4);
        $manager->persist($photo4);

        $photo5 = new Photo('backflip5.jpeg',  'images/tricks/backflip5.jpg',
            'backflip5');
        $this->addReference('photo5', $photo5);
        $manager->persist($photo5);

        $photo6 = new Photo('backflip6.jpeg',  'images/tricks/backflip6.jpg',
            'backflip6');
        $this->addReference('photo6', $photo6);
        $manager->persist($photo6);

        $photo7 = new Photo('crippler1.jpeg',  'images/tricks/crippler1.jpg',
            'crippler1');
        $this->addReference('photo7', $photo7);
        $manager->persist($photo7);

        $photo8 = new Photo('crippler2.jpeg',  'images/tricks/crippler2.jpg',
            'crippler2');
        $this->addReference('photo8', $photo8);
        $manager->persist($photo8);

        $photo9 = new Photo('crippler3.jpeg',  'images/tricks/crippler3.jpg',
            'crippler3');
        $this->addReference('photo9', $photo9);
        $manager->persist($photo9);

        $photo10 = new Photo('frontflip1.jpeg',  'images/tricks/frontflip1.jpg',
            'frontflip1');
        $this->addReference('photo10', $photo10);
        $manager->persist($photo10);

        $photo11 = new Photo('frontflip2.jpeg',  'images/tricks/frontflip2.jpg',
            'frontflip2');
        $this->addReference('photo11', $photo11);
        $manager->persist($photo11);

        $photo12 = new Photo('50-50', 'images/tricks/50-50-1.jpg','50-50');
        $this->addReference('photo12', $photo12);
        $manager->persist($photo12);

        $photo13 = new Photo('50-50-bis', 'images/tricks/50-50-2.jpg', '50-50');
        $this->addReference('photo13', $photo13);
        $manager->persist($photo13);

        $photo14 = new Photo('indy', 'images/tricks/indy.jpg', 'indy');
        $this->addReference('photo14', $photo14);
        $manager->persist($photo14);

        $photo15 = new Photo('indy2', 'images/tricks/indy2.jpg', 'indy2');
        $this->addReference('photo15', $photo15);
        $manager->persist($photo15);

        $photo16 = new Photo('mute', 'images/tricks/mute.jpg', 'mute');
        $this->addReference('photo16', $photo16);
        $manager->persist($photo16);

        $photo17 = new Photo('mute2', 'images/tricks/mute2.jpg', 'mute2');
        $this->addReference('photo17', $photo17);
        $manager->persist($photo17);

        $photo18 = new Photo('mute3', 'images/tricks/mute3.jpg', 'mute3');
        $this->addReference('photo18', $photo18);
        $manager->persist($photo18);

            $manager->flush();
    }
}
