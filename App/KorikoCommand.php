<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Command\Command;
use \Pimple;

class KorikoCommand extends Command
{
    /**
     * The dependency injection container
     * @var \Pimple
     */
    protected $_container;

    /**
     * DIC setter
     * @param \Pimple $container
     */
    public function setContainer(Pimple $container)
    {
        $this->_container = $container;
    }
}
