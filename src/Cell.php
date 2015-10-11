<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\Contracts\ICell;
use CTLaravel\GoL\Contracts\IPosition;

class Cell implements ICell
{
    const ALIVE = 1;
    const DEAD = 0;

    /**
     * @var STATE
     */
    private $state = self::DEAD;

    /**
     * @param $state
     */
    public function __construct($state)
    {
        $this->state = $state;
    }

    /**
     * @return state
     */
    public function state()
    {
        return $this->state;
    }

    public function map(IPosition $position)
    {
        return new MapCell($this->state, $position);
    }
}