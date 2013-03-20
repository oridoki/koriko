<?php

namespace Oridoki\KorikoBundle\Tests\Koriko;

use Oridoki\KorikoBundle\Koriko\Recipe;

class KorikoTest extends \PHPUnit_Framework_TestCase
{
    public function testMe()
    {
        echo phpinfo();
        die;
        $recipe = new Recipe;
        $recipe->execute();
    }
}
