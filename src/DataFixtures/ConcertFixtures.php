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
        $concert1->setName('Tournée 1');
        $concert1->setDateStart(\DateTime::createFromFormat('d/m/Y H:i:s', '14/02/2022 14:00:00'));
        $concert1->setDateEnd(\DateTime::createFromFormat('d/m/Y H:i:s', '14/02/2022 16:00:00'));
        $concert1->setBand($this->getReference(BandFixtures::BAND1_REFERENCE));
        $concert1->setRoom($this->getReference(RoomFixtures::ROOM1_REFERENCE));
        $concert1->addOrganizer($this->getReference(OrganizerFixtures::ORGANIZER1_REFERENCE));

        $manager->persist($concert1);
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
