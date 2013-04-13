<?php

namespace Oridoki\Koriko\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

use Oridoki\Koriko\Recipes\DummyRecipe;

class KorikoCommand extends Command
{
    /**
     * The dependency injection container
     * @var \Pimple
     */
    protected $_container;

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

    /**
     * DIC setter
     * @param \Pimple $container
     */
    public function setContainer(\Pimple $container)
    {
        $this->_container = $container;
    }
}
