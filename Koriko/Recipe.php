<?php

namespace Oridoki\KorikoBundle\Koriko;

class Recipe extends Koriko
{
    function execute()
    {
        $this->task('search_libs', [ 'hosts' => 'www.supu.com' ], function($task) {
            $task->run("ls -x1 /usr/lib | grep -i xml");
            $task->run("ls -x2 /usr/lib | grep -i xml");
            $task->run("ls -x3 /usr/lib | grep -i xml");
            $task->run("ls -x4 /usr/lib | grep -i xml");
        });

        $this->task('count_libs', [ 'hosts' => 'www.supu.com' ], function($task) {
            $task->run("ls -x1 /usr/lib | wc -l");
        });
    }
}
