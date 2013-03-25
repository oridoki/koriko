<?php

namespace Oridoki\Koriko\Tests;
use Oridoki\Koriko\App\Task;

class TaskTest extends \PHPUnit_Framework_TestCase
{
    use Mocks;

    protected $_subject;

    public function setUp()
    {
        $e = new \Exception('tupu');
        $mock = $this->korikoMock($e);

        $taskName = 'test';
        $this->_subject = new Task($mock, $taskName);
    }

    public function testRun()
    {
        try {
            $this->_subject->run('my command');
        } catch(\Exception $e) {
            $this->assertEquals('tupu', $e->getMessage());
        }
    }
}
