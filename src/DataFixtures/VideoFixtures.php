<?php
/**
 * Created by PhpStorm.
 * User: ronsard
 * Date: 04/06/18
 * Time: 19:01
 */

namespace App\DataFixtures;

use App\Domain\Entity\Video;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class VideoFixtures
 *
 * @package App\DataFixtures
 */
final class VideoFixtures extends Fixture
{
    /**
     * (@inheritdoc)
     */
    public function load(ObjectManager $manager)
    {
        // VIDEO
        $video1 = new Video('backflip','https://www.youtube.com/embed/g0L0LnF3JiY?rel=0');
        $this->addReference('video1', $video1);
        $manager->persist($video1);

        $video2 = new Video('backflip2','https://www.youtube.com/watch?v=LTgVt62m0DU');
        $this->addReference('video2', $video2);
        $manager->persist($video2);

        $video3 = new Video('backflip3','https://www.dailymotion.com/embed/video/x4z1iy');
        $this->addReference('video3', $video3);
        $manager->persist($video3);

        $video4 = new Video('backflip4','https://www.youtube.com/watch?v=ZfYmOLEnF28');
        $this->addReference('video4', $video4);
        $manager->persist($video4);

            $manager->flush();


    }
}