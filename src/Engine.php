<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\Contracts\ICell;
use CTLaravel\GoL\Contracts\IRule;

class Engine
{
    /**
     * @var
     */
    private $world;

    /**
     * @var IRule
     */
    private $rule;

    /**
     * Engine constructor.
     *
     * @param       $world
     * @param IRule $rule
     */
    public function __construct(World $world, IRule $rule)
    {
        $this->world = $world;
        $this->worldEvolved = clone $world;
        $this->rule = $rule;
    }

    public function run()
    {
        foreach ($this->world->cells as $cell) {
            /**
             * Evolved cell state
             */
            $state = $this->rule->fate($cell, $this->world->countNeighbours($cell->position, Cell::ALIVE));
            /**
             * Live cells to the evolved world
             */
            if ($state == Cell::ALIVE) {
                $this->worldEvolved->addLiveCell($cell->position);
            }
        }
    }

    public function import($liveCoordinates)
    {
        $this->world->import($liveCoordinates);
    }

    public function export()
    {
        return $this->worldEvolved->export();
    }
}