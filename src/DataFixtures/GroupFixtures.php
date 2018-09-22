<?php

namespace App\DataFixtures;

use App\Domain\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\Tests\Compiler\G;

/**
 * Class GroupFixtures
 *
 * @package App\DataFixtures
 */
final class GroupFixtures extends Fixture
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

            $stall = new Group('stall');
            $this->addReference('stall', $stall);
            $manager->persist($stall);

            $spin = new Group('spin');
            $this->addReference('spin', $spin);
            $manager->persist($spin);

            $tweak = new Group('tweak');
            $this->addReference('tweak', $tweak);
            $manager->persist($tweak);

            $straight = new Group('straight');
            $this->addReference('straight', $straight);
            $manager->persist($straight);

            $manager->flush();
    }
}