<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Band;
use App\DataFixtures\MemberFixtures;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class BandFixtures extends Fixture implements DependentFixtureInterface
{
    public const BAND1_REFERENCE = 'band1';

    public function load(ObjectManager $manager): void
    {
        $band1 = new Band();
        $band1->setName('Band-1');

        $band1->addMember($this->getReference(MemberFixtures::MEMBER1_REFERENCE));

        $manager->persist($band1);
        
        $band2 = new Band();
        $band2->setName('Band-2');

        $manager->persist($band2);

        $manager->flush();

        $this->addReference(self::BAND1_REFERENCE, $band1);
    }

    public function getDependencies()
    {
        return [
            MemberFixtures::class,
        ];
    }
}
