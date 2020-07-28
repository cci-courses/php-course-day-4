<?php

namespace App\Tests\Factory;

use App\Entity\Human;
use App\Exception\EnormousHumanException;
use App\Factory\HumanFactory;
use PHPUnit\Framework\TestCase;

class HumanFactoryTest extends TestCase
{
    /** @var HumanFactory */
    private $factory;

    public function testCreateWhiteMan()
    {
        $human = $this->factory->createWhiteMan(170);

        $this->assertInstanceOf(Human::class, $human);
        $this->checkHuman($human, 170, Human::SEX_MALE, Human::RACE_WHITE);
    }

    public function testCreateWhiteWoman()
    {
        $human = $this->factory->createWhiteWoman(150);

        $this->assertInstanceOf(Human::class, $human);
        $this->checkHuman($human, 150, Human::SEX_FEMALE, Human::RACE_WHITE);
    }

    /**
     * @test
     */
    public function throwsExceptionOnGiantHuman()
    {
        $this->expectException(EnormousHumanException::class);
        $this->expectExceptionMessage('Что за гигантище?');
        $this->factory->createWhiteMan(300);
    }

    private function checkHuman(Human $human, $height, $sex, $race): void
    {
        $this->assertEquals($height, $human->getHeight());
        $this->assertEquals($sex, $human->getSex());
        $this->assertEquals($race, $human->getRace());
    }

    public function setUp(): void
    {
        $this->factory = new HumanFactory();
    }

    public function tearDown(): void
    {
        unset($this->factory);
    }
}
