<?php

namespace App\Console\Commands;

use App\Models\Chicken;
use App\Models\Cow;
use App\Models\Farm;
use Illuminate\Console\Command;

class SimulateFarmLifeCommand extends Command
{
    protected $signature = 'farm:life';

    protected $description = 'Simulate farm life';

    public function handle()
    {
        $weekBeginning = 1;
        $weekend = 7;
        $unclesFarm = new Farm();

        $this->info('There are 10 cows and 20 chickens on the farm.');

        $countOfChicken = 20;
        $countOfCows = 10;

        for ($i = 0; $i < $countOfChicken; $i++) {
            $chicken = new Chicken();
            $unclesFarm->addAnimal($chicken);
        }
        for ($i = 0; $i < $countOfCows; $i++) {
            $cow = new Cow();
            $unclesFarm->addAnimal($cow);
        }

        for ($i = $weekBeginning; $i <= $weekend; $i++) {
            $unclesFarm->collectProducts();
        }

        $this->info($unclesFarm->printCollection());

        $this->info('5 new chickens and 1 cow was brought to the farm.');

        $countOfChicken = 5;

        for ($i = 0; $i < $countOfChicken; $i++) {
            $chicken = new Chicken();
            $unclesFarm->addAnimal($chicken);
        }
        $newCow = new Cow;
        $unclesFarm->addAnimal($newCow);

        $this->info($unclesFarm->printAnimals());

        for ($i = $weekBeginning; $i <= $weekend; $i++) {
            $unclesFarm->collectProducts();
        }

        $this->info($unclesFarm->printCollection());
    }
}
