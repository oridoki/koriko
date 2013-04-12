<?php

namespace Oridoki\Koriko\Tests;

use Oridoki\Koriko\App\Application;
use Oridoki\Koriko\Command\DemoCommand;
use Oridoki\Koriko\Tests\Dummy\Command\DummyCommand;
use Oridoki\Koriko\Tests\Dummy\App\DummyApplication;

class ApplicationTest extends \PHPUnit_Framework_TestCase
{

    protected $_subject;

    public function testScanForCommandsInDefaultFolder()
    {
        $this->_subject = new Application;
        $command = new DemoCommand;
        $command->setApplication($this->_subject);
        $this->assertEquals($command, $this->_subject->get($command->getName()));
    }

    public function testScanForCustomCommandsInCustomFolder()
    {
        $this->_subject = new Application(false);
        $this->_subject
                ->setNamespace('\\Oridoki\\Koriko\\Tests\\Dummy\\Command\\')
                ->setFolder('/Tests/Dummy/Command')
                ->loadCommands();
        $command = new DummyCommand;
        $command->setApplication($this->_subject);
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

}
