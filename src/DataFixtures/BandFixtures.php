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
    public const BAND2_REFERENCE = 'band2';

    public function load(ObjectManager $manager): void
    {
        $band1 = new Band();
        $band1->setName('The Beatles');
        $band1->setImage('1.jpg');
        $band1->addMember($this->getReference(MemberFixtures::MEMBER1_REFERENCE));
        $band1->addMember($this->getReference(MemberFixtures::MEMBER2_REFERENCE));
        $band1->addMember($this->getReference(MemberFixtures::MEMBER3_REFERENCE));
        $band1->addMember($this->getReference(MemberFixtures::MEMBER4_REFERENCE));
        
        $band2 = new Band();
        $band2->setName('The Rolling Stones');
        $band2->setImage('2.jpg');
        $band2->addMember($this->getReference(MemberFixtures::MEMBER5_REFERENCE));
        $band2->addMember($this->getReference(MemberFixtures::MEMBER6_REFERENCE));
        $band2->addMember($this->getReference(MemberFixtures::MEMBER7_REFERENCE));
        $band2->addMember($this->getReference(MemberFixtures::MEMBER8_REFERENCE));
        
        $manager->persist($band1);
        $manager->persist($band2);
        $manager->flush();

        $this->addReference(self::BAND1_REFERENCE, $band1);
        $this->addReference(self::BAND2_REFERENCE, $band2);
    }

    public function getDependencies()
    {
        return [
            MemberFixtures::class,
        ];
    }
}
