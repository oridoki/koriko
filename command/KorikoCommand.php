<?php

namespace Oridoki\Koriko\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use Oridoki\Koriko\Recipes\DummyRecipe;

class KorikoCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('recipe:dummy')
            ->setDescription('Dummy recipe');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $recipe = new DummyRecipe;
        $recipe->cook();
    }
}
