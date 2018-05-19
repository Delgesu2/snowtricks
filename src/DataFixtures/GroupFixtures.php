<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class GroupFixtures extends Fixture
{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
            // GROUP
            $grab = new Group('grab');
            $this->addReference('grab', $grab);
            $manager->persist($grab);

            $flip = new Group('flip');
            $this->addReference('flip', $flip);
            $manager->persist($flip);

            $slide = new Group('slide');
            $this->addReference('slide', $slide);
            $manager->persist($slide);

            $rotation = new Group('rotation');
            $this->addReference('rotation', $rotation);
            $manager->persist($rotation);

            $manager->flush();
    }
}