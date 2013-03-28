<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Application as BaseApplication;

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
        foreach (scandir(dirname(__DIR__) . '/Command') as $file) {
            if (strstr($file, 'Command.php')) {
                $command = '\\Oridoki\\Koriko\\Command\\';
                $command .= str_replace('.php', '', $file);
                $this->add(new $command);
            }
        }
    }

}
