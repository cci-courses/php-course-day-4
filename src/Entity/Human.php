<?php

namespace App\Entity;

class Human
{
    public const SEX_MALE = 'male';
    public const SEX_FEMALE = 'female';

    public const RACE_BLACK = 'черный';
    public const RACE_WHITE = 'белый';
    public const RACE_RED = 'индеец';

    /** @var int */
    private $height = 0;

    /** @var string */
    private $sex;

    /** @var string */
    private $race;

    /**
     * @return int
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * @param int $height
     * @return Human
     */
    public function setHeight(int $height): self
    {
        $this->height = $height;
        return $this;
    }

    /**
     * @return string
     */
    public function getSex(): string
    {
        return $this->sex;
    }

    /**
     * @param string $sex
     * @return Human
     */
    public function setSex(string $sex): self
    {
        $this->sex = $sex;
        return $this;
    }

    /**
     * @return string
     */
    public function getRace(): string
    {
        return $this->race;
    }

    /**
     * @param string $race
     * @return Human
     */
    public function setRace(string $race): self
    {
        $this->race = $race;
        return $this;
    }

    public function getSpecification(): string
    {
        $race = ucfirst($this->getRace());
        $sex = $this->getSex() == self::SEX_FEMALE ? 'женщина' : 'мужчина';
        return sprintf('%s %s ростом %d см', $race, $sex, $this->getHeight());
    }
}
