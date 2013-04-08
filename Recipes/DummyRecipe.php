<?php

namespace Oridoki\Koriko\Recipes;

use Oridoki\Koriko\App\Koriko;

class DummyRecipe extends Koriko
{
    function cook()
    {
        $this->task('mysql_restart', ['host' => 'localhost'], function($task) {
            $task->_mysqlRestart();
        });

/**
        $this->task('search_libs', ['host' => 'localhost'], function($task) {
            $task->run("ls -x1 /usr/lib | grep -i xml");
            $task->run("ls -x2 /usr/lib | grep -i xml");
            $task->run("ls -x3 /usr/lib | grep -i xml");
            $task->run("ls -x4 /usr/lib | grep -i xml");
        });

        $this->task('count_libs', ['host' => 'localhost'], function($task) {
            $task->run("ls -x1 /usr/lib | wc -l");
        });
*/
    }
}
