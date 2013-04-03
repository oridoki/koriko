<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Finder\Finder;

class Application extends BaseApplication {

    const NAME = 'Koriko Deploy System';
    const VERSION = '0.1';
    const DEFAULT_NAMESPACE = '\\Oridoki\\Koriko\\Command\\';
    const DEFAULT_COMMAND_FOLDER = '/../Command';

    public function __construct($commandFolder = self::DEFAULT_COMMAND_FOLDER,
            $namespace = self::DEFAULT_NAMESPACE)
    {
        parent::__construct(static::NAME, static::VERSION);

        $this->_scanForCommandsIn($commandFolder, $namespace);
    }

    protected function _scanForCommandsIn($commandFolder, $namespace)
    {
        $finder = new Finder;
        $finder->files()->name('*Command.php')->in(__DIR__ . $commandFolder);

        foreach ($finder as $file) {
            $command = $namespace . str_replace('.php', '',
                    $file->getRelativePathname());
            $this->add(new $command);
        }
    }

}
