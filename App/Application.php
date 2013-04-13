<?php

namespace Oridoki\Koriko\App;

use Symfony\Component\Console\Application as BaseApplication;
use Symfony\Component\Finder\Finder;
use \Pimple;

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
     * Dependency Injection Container
     * @var \Pimple
     */
    protected $_container;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct(static::NAME, static::VERSION);
    }

    /**
     * Before run, load the DIC and the set of commands
     * @return \Oridoki\Koriko\App\Application
     */
    public function init()
    {
        $this->_initContainer();
        $this->_loadCommands();
        return $this;
    }

    /**
     * Instantiate the default DIC if none is set
     */
    protected function _initContainer()
    {
        if ($this->_container == null) {
            $this->_container = new KorikoContainer;
        }
    }

    /**
     * Simple DIC setter
     * @param Pimple $container
     */
    public function setContainer(Pimple $container)
    {
        $this->_container = $container;
    }

    /**
     * Load all commands
     */
    protected function _loadCommands()
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
        $commandInstance = new $command;
        $commandInstance->setContainer($this->_container);
        return $commandInstance;
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
     */
    public function setFolder($folder)
    {
        $this->_folder = $folder;
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
     */
    public function setNamespace($namespace)
    {
        $this->_folder = $namespace;
    }

}
