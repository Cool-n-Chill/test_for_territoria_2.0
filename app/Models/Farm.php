<?php

namespace App\Models;

class Farm
{
    public array $animalsGroup = [];

    public array $productsCollection = [];

    public function addAnimal(Animal $animal): void
    {
        $name = $animal->getName();
        $this->animalsGroup[$name][] = $animal;
    }

    public function countOfAnimals(): array
    {
        $counts = [];
        foreach ($this->animalsGroup as $animalName => $animals) {
            $counts[$animalName] = count($animals);
        }

        return $counts;
    }

    public function collectProducts(): void
    {
        foreach ($this->animalsGroup as $animalName => $animals) {
            foreach ($animals as $animal) {
                [$productName, $productQuantity] = $animal->getDailyProductAmount();
                if (isset($this->productsCollection[$productName])) {
                    $this->productsCollection[$productName] += $productQuantity;
                } else {
                    $this->productsCollection[$productName] = $productQuantity;
                }
            }
        }
    }

    public function printAnimals(): string
    {
        if (empty($this->countOfAnimals())) {
            return 'This farm has no animals.';
        }

        $animalStringCount = array_map(
            static fn(string $animalName, int $animalCount) => "$animalCount animals of type '$animalName'",
            array_keys($this->countOfAnimals()),
            array_values($this->countOfAnimals()),
        );

        return 'There are ' . implode(', ', $animalStringCount) . ' on this farm.';
    }

    public function printCollection(): string
    {
        if (empty($this->productsCollection)) {
            return 'This farm has no products.';
        }

        $productStringCount = array_map(
            fn(string $productName, int $productCount): string => "$productCount products of type '$productName'",
            array_keys($this->productsCollection),
            array_values($this->productsCollection),
        );

        return 'There are ' . implode(', ', $productStringCount) . ' on this farm.';
    }
}
