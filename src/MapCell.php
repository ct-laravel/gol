<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\Contracts\IPosition;

class MapCell extends Cell
{
    /**
     * @var IPosition
     */
    public $position;

    /**
     * @param mixed     $state
     * @param IPosition $position
     */
    public function __construct($state, IPosition $position)
    {
        parent::__construct($state);
        $this->position = $position;
    }

}