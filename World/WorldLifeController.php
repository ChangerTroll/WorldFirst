<?php

namespace world\World;

use world\Animal\Animal;
use world\Animal\AnimalStorage;
use world\Plant\Plant;
use world\Plant\PlantStorage;

abstract class WorldLifeController {

    public function __construct()
    {
        $this->animalStorage = new AnimalStorage();
        $this->plantStorage = new PlantStorage();
    }

    private AnimalStorage $animalStorage;
    private PlantStorage $plantStorage;

    public function createAnimal(): self
    {
        $this->animalStorage->push(new Animal());
        return $this;
    }

    public function createPlant(): self
    {
        $this->plantStorage->push(new Plant());
        return $this;
    }

    public function getPlantStorage(): PlantStorage
    {
        return $this->plantStorage;
    }
    public function getAnimalStorage(): AnimalStorage
    {
        return $this->animalStorage;
    }
}