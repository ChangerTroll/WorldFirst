<?php

namespace world\Tools;

trait StorageTrait
{
    protected array $collection;

    public function __construct()
    {
        $this->collection = [];
    }

    public function set(int $id, object $data): void
    {
        $this->collection[$id] = $data;
    }

    public function push(object $data): void
    {
        $this->collection[] = $data;
    }

    public function count(): int
    {
        return count($this->collection);
    }

    public function get(int $id): ?object
    {
        if (isset($this->collection[$id])) {
            return $this->collection[$id];
        }
        return null;
    }

    public function currentKey(): ?int
    {
        return current(array_keys($this->collection)) ?? null;
    }

    public function delete(int $id): void
    {
        unset($this->collection[$id]);
    }
}