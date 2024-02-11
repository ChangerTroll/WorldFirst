<?php 

namespace world\Animal;

use world\Plant\PlantStorage;

interface AnimalInterface {
    public function eat(PlantStorage $plants): void;
}