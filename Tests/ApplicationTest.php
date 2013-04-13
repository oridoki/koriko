<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\Application;
use Oridoki\Koriko\Command\KorikoCommand;
use Oridoki\Koriko\Tests\Dummy\App\DummyApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{
    use Mocks;

    protected $_subject;

    public function testScanForCommandsInDefaultFolder()
    {
        $container = $this->dicMock(array());
        $this->_subject = $this->_buildApplication($container);
        $command = $this->_buildCommand($container, $this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testScanForCommandsInCustomFolder()
    {
        $container = $this->dicMock(array());
        $this->_subject = $this->_buildApplication($container);
        $this->_subject->setFolder('/../Command');
        $command = $this->_buildCommand($container, $this->_subject);
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

    private function _buildCommand($container, $app)
    {
        $command = new KorikoCommand;
        $command->setApplication($app);
        $command->setContainer($container);
        return $command;
    }

    private function _buildApplication($container)
    {
        $app = new Application();
        $app->setContainer($container);
        return $app->init();
    }

}
