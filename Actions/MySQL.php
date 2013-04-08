<?php

namespace Oridoki\Koriko\Actions;

trait MySQL
{
    protected function _mysqlStart()
    {
        system('mysql start');
    }

    protected function _mysqlStop()
    {
        system('mysql stop');
    }

    protected function _mysqlRestart()
    {
        system('mysql restart');
    }
}
