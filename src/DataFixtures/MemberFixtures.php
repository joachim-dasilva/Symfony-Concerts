<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Member;

class MemberFixtures extends Fixture
{
    public const MEMBER1_REFERENCE = 'band1-member1';
    public const MEMBER2_REFERENCE = 'band1-member2';
    public const MEMBER3_REFERENCE = 'band1-member3';
    public const MEMBER4_REFERENCE = 'band1-member4';
    public const MEMBER5_REFERENCE = 'band1-member5';
    public const MEMBER6_REFERENCE = 'band1-member6';
    public const MEMBER7_REFERENCE = 'band1-member7';
    public const MEMBER8_REFERENCE = 'band1-member8';

    public function load(ObjectManager $manager): void
    {
        $artist1 = new Member();
        $artist1->setArtistName('Paul McCartney');
        $artist1->setFirstName('Paul');
        $artist1->setLastName('McCartney');
        $artist1->setImage('2.jpg');
        $artist1->setBirthDate(\DateTime::createFromFormat('d/m/Y', '18/06/1942'));
        $artist2 = new Member();
        $artist2->setArtistName('John Lennon');
        $artist2->setFirstName('John');
        $artist2->setLastName('Lennon');
        $artist2->setImage('1.jpg');
        $artist2->setBirthDate(\DateTime::createFromFormat('d/m/Y', '08/12/1940'));
        $artist3 = new Member();
        $artist3->setArtistName('George Harrison');
        $artist3->setFirstName('George');
        $artist3->setLastName('Harrison');
        $artist3->setImage('3.jpg');
        $artist3->setBirthDate(\DateTime::createFromFormat('d/m/Y', '25/02/1943'));
        $artist4 = new Member();
        $artist4->setArtistName('Ringo Starr');
        $artist4->setFirstName('Richard');
        $artist4->setLastName('Starkey');
        $artist4->setImage('4.jpg');
        $artist4->setBirthDate(\DateTime::createFromFormat('d/m/Y', '07/07/1940'));
        
        $artist5 = new Member();
        $artist5->setArtistName('Mick Jagger');
        $artist5->setFirstName('Michael');
        $artist5->setLastName('Jagger');
        $artist5->setImage('5.jpg');
        $artist5->setBirthDate(\DateTime::createFromFormat('d/m/Y', '26/07/1943'));
        $artist6 = new Member();
        $artist6->setArtistName('Keith Richards');
        $artist6->setFirstName('Keith');
        $artist6->setLastName('Richards');
        $artist6->setImage('6.jpg');
        $artist6->setBirthDate(\DateTime::createFromFormat('d/m/Y', '18/12/1943'));
        $artist7 = new Member();
        $artist7->setArtistName('Ronnie Wood');
        $artist7->setFirstName('Ronald');
        $artist7->setLastName('Wood');
        $artist7->setImage('7.jpg');
        $artist7->setBirthDate(\DateTime::createFromFormat('d/m/Y', '01/06/1947'));
        $artist8 = new Member();
        $artist8->setArtistName('Charlie Watts');
        $artist8->setFirstName('Charles');
        $artist8->setLastName('Watts');
        $artist8->setImage('8.jpg');
        $artist8->setBirthDate(\DateTime::createFromFormat('d/m/Y', '02/06/1941'));

        $manager->persist($artist1);
        $manager->persist($artist2);
        $manager->persist($artist3);
        $manager->persist($artist4);
        $manager->persist($artist5);
        $manager->persist($artist6);
        $manager->persist($artist7);
        $manager->persist($artist8);
        $manager->flush();

        $this->addReference(self::MEMBER1_REFERENCE, $artist1);
        $this->addReference(self::MEMBER2_REFERENCE, $artist2);
        $this->addReference(self::MEMBER3_REFERENCE, $artist3);
        $this->addReference(self::MEMBER4_REFERENCE, $artist4);
        $this->addReference(self::MEMBER5_REFERENCE, $artist5);
        $this->addReference(self::MEMBER6_REFERENCE, $artist6);
        $this->addReference(self::MEMBER7_REFERENCE, $artist7);
        $this->addReference(self::MEMBER8_REFERENCE, $artist8);
    }
}
