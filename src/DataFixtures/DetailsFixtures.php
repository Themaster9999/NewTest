<?php

namespace App\DataFixtures;

use App\Entity\Details;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class DetailsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $details = array();

        $d = new Details();
        $d->setName("Rachid");
        $d->setIdcard("A123456");
        $d->setAge(21);
        $d->addProduct($this->getReference('p1'));
        $d->addProduct($this->getReference('p3'));

        array_push($details,$d);

        $d = new Details();
        $d->setName("Hicham");
        $d->setIdcard("F129656");
        $d->setAge(35);
        $d->addProduct($this->getReference('p1'));
        $d->addProduct($this->getReference('p4'));

        array_push($details,$d);

        $d = new Details();
        $d->setName("Lamiae");
        $d->setIdcard("L129886");
        $d->setAge(28);
        $d->addProduct($this->getReference('p2'));
        $d->addProduct($this->getReference('p4'));

        array_push($details,$d);

        foreach($details as $t)
        {
            $manager->persist($t);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ProductsFixtures::class,
        ];
    }
}
