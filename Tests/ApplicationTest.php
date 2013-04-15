<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\Application;
use Oridoki\Koriko\Command\DemoCommand;
use Oridoki\Koriko\Tests\Dummy\Command\DummyCommand;
use Oridoki\Koriko\Tests\Dummy\App\DummyApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    use Mocks;

    protected $_subject;

    public function testScanForCommandsInDefaultFolder()
    {
        $container = $this->dicMock(array());
        $this->_subject = $this->_buildApplication($container);
        $command = $this->_buildCommand(
                new DemoCommand, $container, $this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testScanForCustomCommandsInCustomFolder()
    {
        $container = $this->dicMock(array());
        $this->_subject = $this->_buildApplication($container, false)
                ->setNamespace('\\Oridoki\\Koriko\\Tests\\Dummy\\Command\\')
                ->setFolder('/Tests/Dummy/Command')
                ->init();
        $command = $this->_buildCommand(
                new DummyCommand, $container, $this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testTheConstructorUsesTheDeclaredConstants()
    {
        $dummyApp = new DummyApplication;
        $this->assertEquals(DummyApplication::NAME, $dummyApp->getName());
        $this->assertNotEquals(Application::NAME, $dummyApp->getName());
        $this->assertEquals(DummyApplication::VERSION, $dummyApp->getVersion());
        $this->assertEquals(Application::VERSION, $dummyApp->getVersion());
    }

    /**
     * Inject a container and an app to the received command 
     * @param \Oridoki\Koriko\App\KorikoCommand $command
     * @param type $container
     * @param type $app
     * @return \Oridoki\Koriko\App\KorikoCommand
     */
    private function _buildCommand(
            \Oridoki\Koriko\App\KorikoCommand $command, $container, $app)
    {
        $command->setApplication($app);
        $command->setContainer($container);
        return $command;
    }

    /**
     * Build a DummyApp and inject the container. Also, init the app by default
     * @param type $container
     * @param boolean $init Should the app be initialized?
     * @return \Oridoki\Koriko\Tests\Dummy\App\DummyApplication
     */
    private function _buildApplication($container, $init = true)
    {
        $app = new DummyApplication;
        $app->setContainer($container);
        if ($init) {
            $app->init();
        }
        return $app;
    }

}
