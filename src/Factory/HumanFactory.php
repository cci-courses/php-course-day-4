<?php

namespace App\Factory;

use App\Entity\Human;
use App\Exception\EnormousHumanException;

class HumanFactory
{
    protected const MAX_HEIGHT = 200;

    public function createWhiteMan(int $height): Human
    {
        return $this->createHuman($height, Human::SEX_MALE, Human::RACE_WHITE);
    }

    public function createWhiteWoman(int $height): Human
    {
        return $this->createHuman($height, Human::SEX_FEMALE, Human::RACE_WHITE);
    }

    private function createHuman($height, $sex, $race): Human
    {
        if (!$this->canCreateHuman($height)) {
            throw new EnormousHumanException();
        }

        $human = new Human();
        return $human->setHeight($height)
            ->setSex($sex)
            ->setRace($race);
    }

    private function canCreateHuman($height): bool
    {
        return $height <= self::MAX_HEIGHT;
    }
}
