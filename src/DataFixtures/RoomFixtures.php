<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Room;

class RoomFixtures extends Fixture
{
    public const ROOM1_REFERENCE = 'room1';
    public const ROOM2_REFERENCE = 'room2';
    public const ROOM3_REFERENCE = 'room3';

    public function load(ObjectManager $manager): void
    {
        $room1 = new Room();
        $room1->setName('AccorHotels Arena');
        $room1->setAddress('8 Bd de Bercy, 75012 Paris');
        $room1->setImage('1.jpg');
        $room2 = new Room();
        $room2->setName('Sud de France Arena');
        $room2->setAddress('Rte de la Foire, 34470 Pérols');
        $room2->setImage('2.jpg');
        $room3 = new Room();
        $room3->setName('Paris La Défense Arena');
        $room3->setAddress('8 Rue des Sorins, 92000 Nanterre');
        $room3->setImage('3.jpg');

        $manager->persist($room1);
        $manager->persist($room2);
        $manager->persist($room3);
        $manager->flush();

        $this->addReference(self::ROOM1_REFERENCE, $room1);
        $this->addReference(self::ROOM2_REFERENCE, $room2);
        $this->addReference(self::ROOM3_REFERENCE, $room3);
    }
}
