<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Member;

class MemberFixtures extends Fixture
{
    public const MEMBER1_REFERENCE = 'band1-member1';

    public function load(ObjectManager $manager): void
    {
        $artist1 = new Member();
        $artist1->setArtistName('Dupont-J');
        $artist1->setFirstName('Jean');
        $artist1->setLastName('Dupont');
        $artist1->setBirthDate(\DateTime::createFromFormat('d/m/Y', '14/02/1995'));

        $manager->persist($artist1);
        $manager->flush();

        $this->addReference(self::MEMBER1_REFERENCE, $artist1);
    }
}
