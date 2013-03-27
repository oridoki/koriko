<?php

namespace Oridoki\Koriko\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

use Oridoki\Koriko\Recipes\DummyRecipe;

class KorikoCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('recipe:dummy')
            ->setDescription('Dummy recipe')
            ->addArgument(
                'user',
                InputArgument::REQUIRED,
                'The user for the ssh2 connection'
            )
            ->addArgument(
                'password',
                InputArgument::REQUIRED,
                'The password for the connection'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
//        print_r($input);
//        print_r($output);
        $name = $input->getArgument('user');
        $name = $input->getArgument('password');
        $recipe = new DummyRecipe;
        $recipe->cook();
    }
}
