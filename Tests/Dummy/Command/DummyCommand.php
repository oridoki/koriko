<?php

namespace Oridoki\Koriko\Tests\Dummy\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Oridoki\Koriko\App\KorikoCommand;
use Oridoki\Koriko\Tests\Dummy\Recipes\DummyRecipe;

class DummyCommand extends KorikoCommand
{
    protected function configure()
    {
        $this
            ->setName('recipe:dummy')
            ->setDescription('Dummy recipe');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $recipe = new DummyRecipe($this->_container);
        $recipe->cook();
    }
}
