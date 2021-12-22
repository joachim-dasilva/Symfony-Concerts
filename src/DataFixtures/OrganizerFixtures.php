<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Organizer;

class OrganizerFixtures extends Fixture
{
    public const ORGANIZER1_REFERENCE = 'organizer1';

    public function load(ObjectManager $manager): void
    {
        $organizer1 = new Organizer();
        $organizer1->setFirstName('Alain');
        $organizer1->setLastName('Terrieur');
        $organizer1->setEmail('alainterrieur@email.com');
        $organizer1->setLogin('alaint');
        $organizer1->setPassword('zKDDNZ2E39DZnfel');

        $manager->persist($organizer1);
        $manager->flush();

        $this->addReference(self::ORGANIZER1_REFERENCE, $organizer1);
    }
}
