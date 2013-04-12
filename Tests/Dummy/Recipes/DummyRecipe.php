<?php

namespace Oridoki\Koriko\Tests\Dummy\Recipes;

use Oridoki\Koriko\App\Koriko;

/**
 * A dummy recipe using some basic console commands
 */
class DummyRecipe extends Koriko
{
    function cook()
    {
        $this->task('search_libs', ['host' => 'localhost'], function($task) {
            $task->run("ls -x1 /usr/lib | grep -i xml");
            $task->run("ls -x2 /usr/lib | grep -i xml");
            $task->run("ls -x3 /usr/lib | grep -i xml");
            $task->run("ls -x4 /usr/lib | grep -i xml");
        });

        $this->task('count_libs', ['host' => 'localhost'], function($task) {
            $task->run("ls -x1 /usr/lib | wc -l");
        });
    }
}
