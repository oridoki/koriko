<?php

namespace Oridoki\Koriko\Tests;
use Oridoki\Koriko\App\Koriko;

class KorikoTest extends \PHPUnit_Framework_TestCase
{
    use Mocks;

    protected $_subject;

    public function setUp()
    {
        $components = array(
            'ssh' => $this->sshMock(),
            'logger' => $this->loggerMock()
        );
        $this->_subject = new Koriko($this->dicMock($components));
    }

    public function testTask()
    {
        $taskName = 'supu';
        $options = [];
        $block = function() {
            throw new \Exception('Test');
        };

        try {
            $this->_subject->task($taskName, $options, $block);
        } catch(\Exception $e) {
            $this->assertEquals('Test', $e->getMessage());
        }
    }

}
