<?php namespace CTLaravel\GoL;

use CTLaravel\GoL\contracts\ICell;
use CTLaravel\GoL\Contracts\IMap;
use CTLaravel\GoL\contracts\IMapCell;
use CTLaravel\GoL\Contracts\IPosition;

class World implements IMap
{
    /**
     * @var MapCell[]
     */
    public $cells = [];

    /**
     * @var
     */
    private $width;

    /**
     * @var
     */
    private $height;

    /**
     * @param $width
     * @param $height
     */
    public function __construct($width, $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function reset()
    {
        $this->cells = [];
    }

    /**
     * @param IPosition $position
     */
    public function addLiveCell(IPosition $position)
    {
        $this->cells[$position->hash()] = (new Cell(Cell::ALIVE))->map($position);
    }

    /**
     * @param IPosition $position
     * @param mixed     $state
     *
     * @return int
     */
    public function countNeighbours(IPosition $position, $state)
    {
        $liveNeighbours = 0;

        foreach ($position->neighbours() as $neighbour) {
            if (!$this->outOfBounds($neighbour) &&
                $this->exists($neighbour) &&
                $this->isCellState($neighbour, $state)
            ) {
                $liveNeighbours++;
            }
        }

        return $liveNeighbours;
    }

    public function outOfBounds(Coordinate $position)
    {
        return $position->x > $this->width || $position->x < 0 || $position->y > $this->height || $position->y < 0;
    }

    public function isCellState($position, $state)
    {
        return $this->cells[$position->hash()]->state() == Cell::ALIVE;
    }

    /**
     * @param Coordinate $position
     *
     * @return bool
     */
    public function exists(Coordinate $position)
    {
        return isset($this->cells[$position->hash()]);
    }

    public function addDeadNeighbours(IPosition $position)
    {
        foreach ($position->neighbours() as $neighbour) {
            if (!$this->exists($neighbour)) {
                $this->cells[$neighbour->hash()] = (new Cell(Cell::DEAD))->map($neighbour);
            }
        }
    }

    public function export()
    {
        $coordinates = [];

        foreach ($this->cells as $cell) {
            $coordinates[] = [$cell->position->x, $cell->position->y];
        }

        return $coordinates;
    }

    public function import($liveCoordinates)
    {
        /**
         * Import Live cells
         */
        foreach ($liveCoordinates as $coordinate) {
            list($x, $y) = $coordinate;
            $this->addLiveCell(new Coordinate($x, $y));
        }

        /**
         * Import Dead Neighbour cell
         */
        foreach ($liveCoordinates as $coordinate) {
            list($x, $y) = $coordinate;
            $this->addDeadNeighbours(new Coordinate($x, $y));
        }
    }
}