<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Room;

class RoomFixtures extends Fixture
{
    public const ROOM1_REFERENCE = 'room1';

    public function load(ObjectManager $manager): void
    {
        $room1 = new Room();
        $room1->setName('Salle n°1');
        $room1->setAddress('12 Rue du concert 34000 Montpellier');

        $manager->persist($room1);
        $manager->flush();

        $this->addReference(self::ROOM1_REFERENCE, $room1);
    }
}
