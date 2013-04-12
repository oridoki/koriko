<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Finder\Finder;

class Application extends BaseApplication {
    /**
     * Application name
     */

    const NAME = 'Koriko Deploy System';

    /**
     * Application version
     */
    const VERSION = '0.1';

    /**
     * Commands folder
     * @var string
     */
    protected $_folder = '/Command';

    /**
     * Commands namespace
     * @var string
     */
    protected $_namespace = '\\Oridoki\\Koriko\\Command\\';

    /**
     * Constructor
     * @param boolean $useDefaults Set to false if you want to use a custom
     *                              folder/namespace
     */
    public function __construct($useDefaults = true)
    {
        parent::__construct(static::NAME, static::VERSION);

        if ($useDefaults) {
            $this->loadCommands();
        }
    }

    /**
     * Load all commands
     */
    public function loadCommands()
    {
        foreach ($this->_allCommands() as $file) {
            $command = $this->_command($file);
            $this->add($command);
        }
    }

    /**
     * Get a list of all commands
     * @return \Symfony\Component\Finder\Finder
     */
    protected function _allCommands()
    {
        $finder = new Finder;
        $finder->files()->name('*Command.php')->in($this->_folder());

        return $finder;
    }

    /**
     * Get the command for a given file
     * @param string $file
     * @return Symfony\Component\Console\Command\Command
     */
    protected function _command($file)
    {
        $command = $this->_namespace() . $this->_commandName($file);
        return new $command;
    }

    /**
     * Get the command name for a given file
     * @param string $file
     * @return string
     */
    protected function _commandName($file)
    {
        return str_replace('.php', '', $file->getRelativePathname());
    }

    /**
     * Get the commands folder
     * @return string
     */
    protected function _folder()
    {
        return dirname(__DIR__) . $this->_folder;
    }

    /**
     * Commands folder setter
     * @param string $folder
     * @return \Oridoki\Koriko\App\Application
     */
    public function setFolder($folder)
    {
        $this->_folder = $folder;
        return $this;
    }

    /**
     * Namespace getter
     * @return string
     */
    protected function _namespace()
    {
        return $this->_namespace;
    }

    /**
     * Namespace setter
     * @param string $namespace
     * @return \Oridoki\Koriko\App\Application
     */
    public function setNamespace($namespace)
    {
        $this->_namespace = $namespace;
        return $this;
    }

}
