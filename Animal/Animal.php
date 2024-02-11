<?php

namespace world\Animal;

use world\Plant\PlantStorage;

class Animal implements AnimalInterface
{
    private int $life = 1;

    public function eat(PlantStorage $plants): void
    {
        $plants->delete($plants->currentKey());
        $this->incLife();
    }

    public function getLife(): int
    {
        return $this->life;
    }
    protected function incLife(): void
    {
        $this->life++;
    }

    public function decrLife(): self
    {
        $this->life--;
        return $this;
    }

    protected function foundFood(): void
    {

        $this->life++;
    }
}