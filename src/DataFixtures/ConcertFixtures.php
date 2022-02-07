<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Concert;
use App\DataFixtures\BandFixtures;
use App\DataFixtures\RoomFixtures;
use App\DataFixtures\OrganizerFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ConcertFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $concert1 = new Concert();
        $concert1->setName('Concert 1');
        $concert1->setDateStart(\DateTime::createFromFormat('d/m/Y H:i:s', '14/05/2022 14:00:00'));
        $concert1->setDateEnd(\DateTime::createFromFormat('d/m/Y H:i:s', '14/05/2022 16:00:00'));
        $concert1->setBand($this->getReference(BandFixtures::BAND1_REFERENCE));
        $concert1->setRoom($this->getReference(RoomFixtures::ROOM1_REFERENCE));
        $concert1->addOrganizer($this->getReference(OrganizerFixtures::ORGANIZER1_REFERENCE));

        $concert2 = new Concert();
        $concert2->setName('Concert 2');
        $concert2->setDateStart(\DateTime::createFromFormat('d/m/Y H:i:s', '14/01/2022 14:00:00'));
        $concert2->setDateEnd(\DateTime::createFromFormat('d/m/Y H:i:s', '14/01/2022 16:00:00'));
        $concert2->setBand($this->getReference(BandFixtures::BAND2_REFERENCE));
        $concert2->setRoom($this->getReference(RoomFixtures::ROOM3_REFERENCE));
        $concert2->addOrganizer($this->getReference(OrganizerFixtures::ORGANIZER1_REFERENCE));

        $concert3 = new Concert();
        $concert3->setName('Concert 3');
        $concert3->setDateStart(\DateTime::createFromFormat('d/m/Y H:i:s', '14/03/2022 14:00:00'));
        $concert3->setDateEnd(\DateTime::createFromFormat('d/m/Y H:i:s', '14/03/2022 16:00:00'));
        $concert3->setBand($this->getReference(BandFixtures::BAND2_REFERENCE));
        $concert3->setRoom($this->getReference(RoomFixtures::ROOM2_REFERENCE));
        $concert3->addOrganizer($this->getReference(OrganizerFixtures::ORGANIZER1_REFERENCE));

        $manager->persist($concert1);
        $manager->persist($concert2);
        $manager->persist($concert3);
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            BandFixtures::class,
            RoomFixtures::class,
            OrganizerFixtures::class,
        ];
    }
}
