<?php

namespace App\Tests\Entity;

use App\Entity\Human;
use PHPUnit\Framework\TestCase;

class HumanTest extends TestCase
{
    public function testGetLength()
    {
        $human = new Human();
        $this->assertEquals(0, $human->getHeight());

        $human->setHeight(170);
        $this->assertEquals(170, $human->getHeight(), 'Length wasn\'t set');
    }

    /**
     * @dataProvider specificationProvider
     */
    public function testGetSpecification($expectedSpec, $length, $sex, $race)
    {
        $human = new Human();
        $human->setHeight($length);
        $human->setSex($sex);
        $human->setRace($race);

        $this->assertEquals($expectedSpec, $human->getSpecification());
    }

    public function specificationProvider()
    {
        return array(
            'белый 170 м' => array('белый мужчина ростом 170 см', 170, Human::SEX_MALE, Human::RACE_WHITE),
            'черный 150 м' => array('черный мужчина ростом 150 см', 150, Human::SEX_MALE, Human::RACE_BLACK)
        );
    }
}
