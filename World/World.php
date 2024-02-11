<?php

namespace world\World;

use world\Animal\Animal;
use world\Animal\AnimalLifeController;
use world\World\WorldInterface;
use world\World\WorldLifeController;

class World extends WorldLifeController implements WorldInterface
{
    const WORL_YEAR_LIMIT = 50;

    private int $year = 0;

    public function __construct()
    {
        parent::__construct();
        $this->born();
    }

    private function born(): void
    {
        $this->createAnimal()
        ->createPlant()
        ->createPlant();
    }

    public function startCycles(): void
    {
        for ($this->year; $this->year < self::WORL_YEAR_LIMIT; $this->year++) {
            $this->createPlant();
        
            if($this->getAnimalStorage()->count() == 0){
                break;
            }
        
            for($countAnimal = 0; $countAnimal < $this->getAnimalStorage()->count(); $countAnimal++){
                /** @var \world\World\Animal\Animal $animal */
                $animal = &$this->getAnimalStorage()->get($countAnimal);
                if(is_null($animal)){
                    break;
                }
                AnimalLifeController::cycle($this->getPlantStorage(), $animal);
                AnimalLifeController::controleLife($animal, $this, $countAnimal);
            }
        }
    }

    public function getYear(): int
    {
        return $this->year;
    }
}

