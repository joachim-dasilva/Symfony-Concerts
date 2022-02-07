<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Organizer;

class OrganizerFixtures extends Fixture
{
    public const ORGANIZER1_REFERENCE = 'organizer1';
    public const ORGANIZER2_REFERENCE = 'organizer2';

    public function load(ObjectManager $manager): void
    {
        $organizer1 = new Organizer();
        $organizer1->setFirstName('Alain');
        $organizer1->setLastName('Terrieur');
        $organizer1->setEmail('alainterrieur@email.com');
        $organizer1->setLogin('alaint');
        $organizer1->setPassword('fz383Hdn');
        $organizer2 = new Organizer();
        $organizer2->setFirstName('Alex');
        $organizer2->setLastName('Terrieur');
        $organizer2->setLogin('alext');
        $organizer2->setPassword('NDJZBDZH343Bzdbz');
        $organizer2->setEmail('alexterrieur@email.com');

        $manager->persist($organizer1);
        $manager->persist($organizer2);
        $manager->flush();

        $this->addReference(self::ORGANIZER1_REFERENCE, $organizer1);
        $this->addReference(self::ORGANIZER2_REFERENCE, $organizer2);
    }
}
