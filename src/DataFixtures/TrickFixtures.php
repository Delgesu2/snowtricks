<?php

namespace App\DataFixtures;

use App\Entity\Trick;
use App\DataFixtures\PhotoFixtures;
use App\DataFixtures\GroupFixtures;
use App\DataFixtures\UserFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class TrickFixtures extends Fixture implements DependentFixtureInterface

{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
            //TRICK
            $backflip = new Trick(
                'backflip','Flipping backwards (like a standing backflip) off of a jump',
                $this->getReference('flip'),
                $this->getReference('polo'),
                [
                    $this->getReference('photo1'),
                    $this->getReference('photo2'),
                    $this->getReference('photo3'),
                    $this->getReference('photo4')
                ],

                [
                    $this->getReference('video1'),
                    $this->getReference('video2'),
                    $this->getReference('video3'),
                    $this->getReference('video4')
                ]
            );
                $this->addReference('backflip', $backflip);

            $manager->persist($backflip);
            //

            $crippler = new Trick('crippler', ' Bring your knees right up to your chest, grabbing your board to help keep your body tight. Continue looking over your front shoulder, pulling with your grabbing hand if you need some extra power',
                $this->getReference('flip'),
                $this->getReference('mouloud'),
                [
                    $this->getReference('photo8')
                ]
            );
                $this->addReference('crippler', $crippler);

            $manager->persist($crippler);
            //

            $frontflip = new Trick('frontflip', 'Flipping forward (like a standing frontflip) off of a jump.',
                $this->getReference('flip'),
                $this->getReference('john'),
                [
                    $this->getReference('photo10')
                ]
            );
                $this->addReference('frontflip', $frontflip);

            $manager->persist($frontflip);
            //

            $fifty = new Trick('fifty-fifty', 'A slide in which a snowboarder rides straight along a rail or other obstacle.[1] This trick has its origin in skateboarding, where the trick is performed with both skateboard trucks grinding along a rail.',
                $this->getReference('slide'),
                $this->getReference('eusebius'),
                [
                    $this->getReference('photo4')
                ]
            );
                $this->addReference('fifty', $fifty);

            $manager->persist($fifty);
            //

            $backside = new Trick('backside', 'A slide in which a snowboarder rides straight along a rail or other obstacle.[1] This trick has its origin in skateboarding, where the trick is performed with both skateboard trucks grinding along a rail.',
                $this->getReference('slide'),
                $this->getReference('eusebius'),
                [
                    $this->getReference('photo13')
                ]
            );
                $this->addReference('backside', $backside);

            $manager->persist($backside);
            //

            $mute = new Trick('mute', 'saisie de la carre frontside de la planche entre les deux pieds avec la main avant',
                $this->getReference('grab'),
                $this->getReference('mouloud'),
                [
                    $this->getReference('photo16'),
                    $this->getReference('photo17'),
                    $this->getReference('photo18')
                ]
            );
                $this->addReference('mute', $mute);

                $manager->persist($mute);
            //

                $indy = new Trick('indy', 'saisie de la carre frontside de la planche, entre les deux pieds, avec la main arrière',
                    $this->getReference('grab'),
                    $this->getReference('john'),
                [
                    $this->getReference('photo14'),
                    $this->getReference('photo15')
                ]
                );
                $this->addReference('indy', $indy);

                $manager->persist($indy);
                //

        /**for ($i=1; $i < 20; $i++) {
            $trick = new Trick('trick'.$i, 'very good trick',
                $this->getReference('rotation'),
                $this->getReference('eusebius'),
                [
                    $this->getReference('photo12'),
                    $this->getReference('photo11'),
                    $this->getReference('photo5'),
                    $this->getReference('photo6')
                ]
            );

            $this->addReference('trick'.$i, $trick);
            //

            $manager->persist($trick);
        }
         **/
            $manager->flush();

        }


    public function getDependencies()
    {
        return array(
            PhotoFixtures::class,
            UserFixtures::class,
            PhotoFixtures::class,
            VideoFixtures::class
        );
    }
}
