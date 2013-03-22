<?php

namespace KorikoBundle\Tests\Koriko;

use Oridoki\KorikoBundle\Koriko\Recipe;

class KorikoTest extends \PHPUnit_Framework_TestCase
{
    public function testMe()
    {
        $recipe = new Recipe;
        $recipe->execute();
    }
}
