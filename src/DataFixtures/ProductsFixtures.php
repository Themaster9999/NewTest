<?php

namespace App\DataFixtures;

use App\Entity\Products;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $products = array();

        $p = new Products();
        $p->setName("Shampoo");
        $p->setPrice(25.50);
        array_push($products,$p);

        $p = new Products();
        $p->setName("Lighter");
        $p->setPrice(5.95);
        array_push($products,$p);
        
        $p = new Products();
        $p->setName("Soap");
        $p->setPrice(2.50);
        array_push($products,$p);

        $p = new Products();
        $p->setName("Charger");
        $p->setPrice(38.75);
        array_push($products,$p);

        
        foreach($products as $t)
        {
            $manager->persist($t);
        }

        $manager->flush();

        for($i=0;$i<count($products);$i++)
        {
            $this->addReference('p'.strval($i+1),$products[$i]);
        }
    }
}
