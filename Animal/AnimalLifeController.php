<?php

namespace world\Animal;

use world\Plant\PlantStorage;
use world\Tools\ConsoleText;

class AnimalLifeController
{
    const OLD_AN = 10;

    const YANG_AN = 1;

    const BORN_AN = 5;

    const WEIGHT_RAND = 9;

    const RAND_CHANCE = 3;

    const RAND_MIN = 0;

    public function controleLife(Animal $animal, \world\World\World $world, int $countAnimal): void
    {
        if ($animal->getLife() > self::OLD_AN || $animal->getLife() < self::YANG_AN) {
            $world->createPlant();
            $world->getAnimalStorage()->delete($countAnimal);
        }

        if ($animal->getLife() < self::YANG_AN) {
            ConsoleText::echoTextRed('Умерло животное от голода');
        }

        if ($animal->getLife() > self::OLD_AN) {
            ConsoleText::echoTextRed('Умерло животное от старости');
        }

        if ($animal->getLife() > self::BORN_AN) {
            $rand = rand(self::RAND_MIN, abs($animal->getLife() - self::WEIGHT_RAND));
            if ($rand < self::RAND_CHANCE) {
                ConsoleText::echoTextGreen('Животное родилось!');
                $animal->decrLife()->decrLife()->decrLife()->decrLife();
                $world->createAnimal();
            }
        }
    }

    public function cycle(PlantStorage $plants, Animal $animal): void
    {
        $rand = rand(self::RAND_MIN, abs($animal->getLife() - self::WEIGHT_RAND));
        if ($rand < self::RAND_CHANCE) {
            $animal->decrLife();
        } else {
            if ($plants->count() > 0) {
                $animal->eat($plants);
            } else {
                $animal->decrLife();
            }
        }

    }
}