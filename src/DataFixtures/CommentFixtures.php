<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 17/05/18
 * Time: 18:23
 */

namespace App\DataFixtures;

use App\Entity\Comment;
use App\DataFixtures\UserFixtures;
use App\DataFixtures\TrickFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
        // COMMENT
        $comment1 = new Comment('commentaire super interessant', $this->getReference('john'), $this->getReference('backflip'));
        $manager->persist($comment1);

        $comment2 = new Comment('Ce trick est fortement déconseillé au cas d\'hernie discale.',
            $this->getReference('polo'), $this->getReference('fifty'));
        $manager->persist($comment2);

        $comment3 = new Comment('Acrobatique, mortel et dangereux !', $this->getReference('mouloud'), $this->getReference('frontflip'));
        $manager->persist($comment3);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            UserFixtures::class,
            TrickFixtures::class
        );
    }
}
