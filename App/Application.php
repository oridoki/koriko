<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Finder\Finder;

class Application extends BaseApplication
{

    const NAME = 'Koriko Deploy System';
    const VERSION = '0.1';

    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);

        $this->_scanForCommands();
    }

    protected function _scanForCommands()
    {
        $finder = new Finder;
        $finder->files()->name('*Command.php')->in(dirname(__DIR__) . '/Command');

        foreach ($finder as $file) {
            $command = '\\Oridoki\\Koriko\\Command\\';
            $command .= str_replace('.php', '', $file->getRelativePathname());
            $this->add(new $command);
        }
    }

}
