<?php

use CTLaravel\GoL\Conway;
use CTLaravel\GoL\Engine;
use CTLaravel\GoL\World;

class WorldTest extends PHPUnit_Framework_TestCase
{

    public function test_world()
    {
        $world = new World(10, 10);
        $rules = new Conway();
        $engine = new Engine($world, $rules);
        $cells = [
            [1, 1], [2, 1],
            [1, 2], [2, 2],
        ];
        $engine->import($cells);

        $engine->run();

        $this->assertEquals($cells, $engine->export());
    }
}
