<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Genus;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;

class LoadFixtures implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $objects = Fixtures::load(
            __DIR__.'/fixtures.yml',
            $manager,
            [
                'providers' => [$this]
            ]
        );
    }

    public function productTitle()
    {
        $prefix = [
            'Dżersejowy',
            'Satynowy',
            'Bawełniany',
            'Drapowany',
            'Szeroki',
            'Welurowy',
            'Jedwabny',
            'Dwuwarstwowy'
        ];

        $type = [
            'T-shirt',
            'Top',
            'Sweter',
            'Golf',
        ];

        $suffix = [
            'z odkrytymi ramionami',
            'w paski',
            'w serek',
            'z długim rękawem',
            'z falbankami',
            'z głębokim dekoltem z tyłu',
            'z bufiastym rękawem',
            'o splocie w prążki',
        ];

        return $this->returnRandomItem($prefix). " ". $this->returnRandomItem($type). " ". $this->returnRandomItem($suffix);
    }

    public function floatBetween($min, $max){
        return mt_rand( $min, $max ) / 10;
    }

    private function returnRandomItem($fromArray){
        $key = array_rand($fromArray);

        return $fromArray[$key];
    }
}