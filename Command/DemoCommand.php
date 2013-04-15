<?php

namespace Oridoki\Koriko\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Oridoki\Koriko\App\KorikoCommand;
use Oridoki\Koriko\Recipes\DemoRecipe;

class DemoCommand extends KorikoCommand
{
    protected function configure()
    {
        $this
            ->setName('recipe:demo')
            ->setDescription('Executes the Demo Recipe');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $recipe = new DemoRecipe;
        $recipe->cook();
    }
}
